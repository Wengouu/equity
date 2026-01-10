import time
import json
import re
import sys
import os
from openai import OpenAI

# 1. Configuration des identifiants
API_KEY = "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"
ASSISTANT_ID = "asst_BWyT0xThTmM25XV3tqrMKHkK"
SYSTEM_PROMPT = "Tu es Kalvin, le Coach IA d'Equity, expert en finance et arbitre du jeu."

# 2. Dossier de sauvegarde
TARGET_FOLDER = "./output"
FULL_PATH = os.path.join(TARGET_FOLDER, "equity_feedback_dataset.jsonl")

if not os.path.exists(TARGET_FOLDER):
    os.makedirs(TARGET_FOLDER)

client = OpenAI(api_key=API_KEY)

def nettoyer_reponse(texte):
    """Enlève les balises de sources pour le dataset"""
    return re.sub(r"【.*?】", "", texte).strip()

def sauvegarder_interaction(question, reponse, note):
    """Enregistre dans le fichier JSONL"""
    mapping_notes = {"b": "Bonne", "n": "Neutre", "m": "Mauvaise"}
    label_note = mapping_notes.get(note.lower(), "Inconnue")
    
    donnees = {
        "messages": [
            {"role": "system", "content": SYSTEM_PROMPT},
            {"role": "user", "content": question},
            {"role": "assistant", "content": nettoyer_reponse(reponse)}
        ],
        "rating": label_note,
        "timestamp": time.strftime("%Y-%m-%d %H:%M:%S")
    }
    
    with open(FULL_PATH, "a", encoding="utf-8") as f:
        f.write(json.dumps(donnees, ensure_ascii=False) + "\n")
    print(f"💾 Interaction sauvegardée avec succès [{label_note}]")

def chat_interactif():
    print("=== CENTRE D'ENTRAÎNEMENT KALVIN ===")
    print(f"Sauvegarde : {FULL_PATH}")
    print("👉 Appuyez sur [ENTRÉE] sans rien écrire pour quitter.\n")
    
    thread = client.beta.threads.create()
    
    while True:
        # Récupération de l'input et nettoyage des espaces
        question = input("\n👤 Joueur : ").strip()
        
        # LOGIQUE : Si l'entrée est vide (ou mots clés), on quitte
        if not question or question.lower() in ["quitter", "exit", "quit"]:
            print("\n👋 Fin de la conversation. Tes retours ont été précieux pour Kalvin !")
            break

        # Envoi à l'API OpenAI
        client.beta.threads.messages.create(
            thread_id=thread.id,
            role="user",
            content=question
        )
        
        run = client.beta.threads.runs.create(
            thread_id=thread.id,
            assistant_id=ASSISTANT_ID
        )

        print("⏳ Kalvin réfléchit...", end="\r")
        while True:
            run_status = client.beta.threads.runs.retrieve(thread_id=thread.id, run_id=run.id)
            if run_status.status == "completed":
                break
            if run_status.status in ["failed", "cancelled", "expired"]:
                print(f"\n❌ Erreur : {run_status.status}")
                return
            time.sleep(1)
        
        # Récupération et affichage de la réponse
        messages = client.beta.threads.messages.list(thread_id=thread.id)
        reponse_brute = messages.data[0].content[0].text.value
        print(f"\n🤖 KALVIN :\n{reponse_brute}\n")

        # Système de notation
        vote = ""
        while vote not in ["b", "n", "m", "s"]:
            vote = input("⭐ Note (B: Bonne, N: Neutre, M: Mauvaise, S: Passer) : ").lower()
        
        if vote != "s":
            sauvegarder_interaction(question, reponse_brute, vote)

if __name__ == "__main__":
    try:
        chat_interactif()
    except Exception as e:
        print(f"\nUne erreur est survenue : {e}")
