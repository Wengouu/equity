<?php

namespace App\Filament\Resources\Modules\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cours_id')
                ->relationship('cours', 'titre')
                ->label('Cours associé au module')
                ->required(),
                TextInput::make('titre')
                    ->label('Titre du module')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug du module (titre dans l\'URL)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description du module')
                    ->rows(3)
                    ->required()
                    ->maxLength(65535),
                FileUpload::make('image')
                    ->label('Image du module')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('modules-images')
                    ->nullable(),
                Toggle::make('publie')
                    ->label('Publier le module')
                    ->default(false)
            ]);
    }
}
