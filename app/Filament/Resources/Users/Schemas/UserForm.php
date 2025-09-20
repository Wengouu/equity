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
                    ->label("Name of the User")
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->label("Email of the User")
                    ->email()
                    ->maxLength(255)
                    ->required(),
                TextInput::make('password')
                    ->label("Password of the User (will be reset on first login)")
                    ->password()
                    ->maxLength(255)
                    ->required(),
            ]);
    }
}
