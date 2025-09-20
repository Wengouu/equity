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
                ->label('Associated Course')
                ->required(),
                TextInput::make('titre')
                    ->label('Module Title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Module Slug (what will appear in the URL)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Module Description')
                    ->rows(3)
                    ->required()
                    ->maxLength(65535),
                FileUpload::make('image')
                    ->label('Module Image')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('modules-images')
                    ->nullable(),
                Toggle::make('publie')
                    ->label('Directly Publish Module ?')
                    ->default(true)
            ]);
    }
}
