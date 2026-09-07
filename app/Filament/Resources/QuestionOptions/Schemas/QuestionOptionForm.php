<?php

namespace App\Filament\Resources\QuestionOptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('question_id')
                    ->relationship('question', 'question')
                    ->label('سوال')
                    ->required(),

                TextInput::make('option')
                    ->label('پاسخ')
                    ->required(),

            ]);
    }
}
