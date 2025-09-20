<?php

namespace App\Filament\Resources\Videos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

//TODO :
/*
- Controller avec des fonctions communes (markdown vers html , chaine en slug, etc.)
- Afficher la vidéo sur le site
*/

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('module_id')
                    ->relationship('module', 'titre')
                    ->label('Associated Module')
                    ->required(),
                TextInput::make('titre')
                    ->label('Video Title')
                    ->nullable()
                    ->maxLength(255),
                FileUpload::make('fichier')
                    ->label('Video File')
                    ->disk('public')
                    ->directory('modules-videos')
                    ->maxSize(50 * 1024) // en Ko, 50 Mo
                    ->required(),
                MarkdownEditor::make('transcription')
                    ->label('Video Transcription')
                    ->nullable(),
                Toggle::make('publie')
                    ->label('Directly Publish Video ?')
                    ->default(true),
            ]);
    }
}
