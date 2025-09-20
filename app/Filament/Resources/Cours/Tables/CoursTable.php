<?php

namespace App\Filament\Resources\Cours\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class CoursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre')->label('Course Title')->searchable()->sortable(),
                TextColumn::make('description')->label('Course Description')->limit(50)->wrap(),
                IconColumn::make('publie')->label('Is Published ?')->boolean()->sortable(),
                TextColumn::make('created_at')->label('Created On')->dateTime('d/m/Y H:i')->sortable(),
                TextColumn::make('updated_at')->label('Updated On')->dateTime('d/m/Y H:i')->sortable(),
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
