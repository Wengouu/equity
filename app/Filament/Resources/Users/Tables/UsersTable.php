<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->label('User Email')->searchable()->sortable(),
                TextColumn::make('name')->label('User Name')->searchable()->sortable(),
                IconColumn::make('must_reset_password')->label('Has Reset Password?')
                ->getStateUsing(function ($record) {
                    return !$record->must_reset_password;
                })
                ->boolean()
                ->sortable(),
                TextColumn::make('created_at')->label('Added on')->dateTime('d/m/Y H:i')->sortable(),
                TextColumn::make('updated_at')->label('Updated on')->dateTime('d/m/Y H:i')->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
