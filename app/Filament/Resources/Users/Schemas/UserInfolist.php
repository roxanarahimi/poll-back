<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Http\Controllers\DateController;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('role')->label('نوع کاربر'),
                TextEntry::make('name')->label('نام'),
                TextEntry::make('mobile')->label('موبایل'),
                TextEntry::make('email')->label('ایمیل'),
                TextEntry::make('created_at')
                    ->label('تاریخ عضویت')
                    ->formatStateUsing(fn($state) => explode(' ', (new DateController())->toPersian($state))[0]),
                RepeatableEntry::make('polls')
                    ->label('نظرسنجی‌ها')
                    ->schema([
                        RepeatableEntry::make('option')
                            ->label('گزینه‌ها')
                            ->schema([
                                TextEntry::make('option')
                                    ->label('گزینه'),

                                TextEntry::make('question.question')
                                    ->label('سوال'),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
