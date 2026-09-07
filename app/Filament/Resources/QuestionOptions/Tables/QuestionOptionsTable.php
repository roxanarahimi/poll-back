<?php

namespace App\Filament\Resources\QuestionOptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuestionOptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('option')
                    ->label('پاسخ')
                    ->searchable(),
                TextColumn::make('question.question')
                    ->label('سوال')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
//                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
//                BulkActionGroup::make([
//                    DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
