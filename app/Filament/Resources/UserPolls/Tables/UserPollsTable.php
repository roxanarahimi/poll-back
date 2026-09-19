<?php

namespace App\Filament\Resources\UserPolls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserPollsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.mobile')
                    ->label('شماره موبایل کاربر')
                    ->searchable(),
                TextColumn::make('option.option')
                    ->label('پاسخ')
                    ->searchable(),
                TextColumn::make('option.question.question')
                    ->label('سوال')
                    ->searchable(),


            ])
            ->filters([
                //
            ])
            ->recordActions([
//                ViewAction::make(),
//                EditAction::make(),
            ])
            ->toolbarActions([
//                BulkActionGroup::make([
//                    DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
