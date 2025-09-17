<?php

namespace App\Filament\Resources\Cours\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class CoursForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titre')
                    ->label('Titre du cours')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug du cours (titre dans l\'URL)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description du cours')
                    ->rows(3)
                    ->required()
                    ->maxLength(65535),
                FileUpload::make('image')
                    ->label('Image du cours')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('cours-images')
                    ->nullable(),
                Toggle::make('publie')
                    ->label('Publier le cours')
                    ->default(false)
            ]);
    }
}
