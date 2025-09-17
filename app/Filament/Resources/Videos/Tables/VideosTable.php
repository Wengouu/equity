<?php

namespace App\Filament\Resources\Videos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('module.titre')->label('Module associé')->searchable()->sortable(),
                TextColumn::make('titre')->label('Titre de la vidéo')->searchable()->sortable(),
                // TextColumn::make('fichier')->label('Nom du fichier de la vidéo')->searchable()->sortable(),
                TextColumn::make('transcription')->label('Transcription textuelle de la vidéo')->limit(50)->wrap(),
                IconColumn::make('publie')->label('Publié')->boolean()->sortable(),
                TextColumn::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i')->sortable(),
                TextColumn::make('updated_at')->label('Mis à jour le')->dateTime('d/m/Y H:i')->sortable(),
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
