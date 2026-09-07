<?php

namespace App\Filament\Resources\QuestionOptions;

use App\Filament\Resources\QuestionOptions\Pages\CreateQuestionOption;
use App\Filament\Resources\QuestionOptions\Pages\EditQuestionOption;
use App\Filament\Resources\QuestionOptions\Pages\ListQuestionOptions;
use App\Filament\Resources\QuestionOptions\Pages\ViewQuestionOption;
use App\Filament\Resources\QuestionOptions\Schemas\QuestionOptionForm;
use App\Filament\Resources\QuestionOptions\Schemas\QuestionOptionInfolist;
use App\Filament\Resources\QuestionOptions\Tables\QuestionOptionsTable;
use App\Models\QuestionOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuestionOptionResource extends Resource
{
    protected static ?string $model = QuestionOption::class;
    protected static ?string $modelLabel = 'پاسخ سوال';
    protected static ?string $pluralModelLabel = 'پاسخ های سوالات';
    protected static ?int $navigationSort = 2;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'option';

    public static function form(Schema $schema): Schema
    {
        return QuestionOptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return QuestionOptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuestionOptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQuestionOptions::route('/'),
            'create' => CreateQuestionOption::route('/create'),
            'view' => ViewQuestionOption::route('/{record}'),
            'edit' => EditQuestionOption::route('/{record}/edit'),
        ];
    }
}
