<?php

namespace App\Filament\Resources\UserPolls\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserPollInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                        TextEntry::make('option.option')->lable('متن پاسخ'),
                 RepeatableEntry::make('polls')
                    ->label('انتخاب شده توسط کاربران')
                    ->schema([
                        TextEntry::make('user.mobile')
                            ->label('شماره موبایل'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
