<?php

namespace App\Filament\Resources\Users\Tables;

use App\Http\Controllers\DateController;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('mobile')
                    ->label('موبایل'),
                TextColumn::make('name')
                    ->label('نام'),
                TextColumn::make('email')
                    ->label('ایمیل'),
                TextColumn::make('created_at')
                    ->label('تاریخ عضویت')
                    ->formatStateUsing(fn($state) => explode(' ', (new DateController())->toPersian($state))[0]),

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
