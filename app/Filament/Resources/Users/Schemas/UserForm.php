<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label("Nom / Pseudo de l'utilisateur")
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->label("Email de l'utilisateur")
                    ->email()
                    ->maxLength(255)
                    ->required(),
                TextInput::make('password')
                    ->label("Mot de passe de l'utilisateur")
                    ->password()
                    ->maxLength(255)
                    ->required(),
            ]);
    }
}
