<?php

namespace App\Filament\Resources\Videos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('module.titre')->label('Associated Module')->searchable()->sortable(),
                TextColumn::make('titre')->label('Video Title')->searchable()->sortable(),
                // TextColumn::make('fichier')->label('Video File Name')->searchable()->sortable(),
                TextColumn::make('transcription')->label('Video Transcription')->limit(50)->wrap(),
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
