<?php

namespace App\Filament\Resources\Cours\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class CoursForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titre')
                    ->label('Course Title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Course Slug (what will appear in the URL)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Course Description')
                    ->rows(3)
                    ->required()
                    ->maxLength(65535),
                FileUpload::make('image')
                    ->label('Course Image')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('cours-images')
                    ->nullable(),
                Section::make('Directly Publish Course')
                ->description('If unchecked, the course page will be accessible only via the URL and will not be visible to users until published')
                ->schema([
                    Toggle::make('publie')
                    ->label('Publish ?') 
                        ->default(true),
                ]),
            ]);
    }
}
