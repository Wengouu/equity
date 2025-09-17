<?php

namespace App\Filament\Resources\Videos\Schemas;

phpinfo();

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('module_id')
                ->relationship('module', 'titre')
                ->label('Module associé à la vidéo')
                ->required(),
                TextInput::make('titre')
                    ->label('Titre de la vidéo')
                    ->nullable()
                    ->maxLength(255),
                FileUpload::make('fichier')
                    ->label('Fichier de la Vidéo')
                    ->disk('public')
                    ->directory('videos')
                    ->maxSize(50 * 1024) // en Ko, 50 Mo
                    ->required(),
                MarkdownEditor::make('transcription')
                    ->label('Transcription de la vidéo')
                    ->nullable(),
                Toggle::make('publie')
                    ->label('Publier la vidéo')
                    ->default(false)
            ]);
    }
}
