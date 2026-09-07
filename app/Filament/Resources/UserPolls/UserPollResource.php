<?php

namespace App\Filament\Resources\UserPolls;

use App\Filament\Resources\UserPolls\Pages\CreateUserPoll;
use App\Filament\Resources\UserPolls\Pages\EditUserPoll;
use App\Filament\Resources\UserPolls\Pages\ListUserPolls;
use App\Filament\Resources\UserPolls\Pages\ViewUserPoll;
use App\Filament\Resources\UserPolls\Schemas\UserPollForm;
use App\Filament\Resources\UserPolls\Schemas\UserPollInfolist;
use App\Filament\Resources\UserPolls\Tables\UserPollsTable;
use App\Models\UserPoll;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserPollResource extends Resource
{
    protected static ?string $model = UserPoll::class;
    protected static ?string $modelLabel = 'پاسخ کاربر';
    protected static ?string $pluralModelLabel = 'پاسخ های کاربران';
    protected static ?int $navigationSort = 4;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UserPollForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserPollInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserPollsTable::configure($table);
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
            'index' => ListUserPolls::route('/'),
            'create' => CreateUserPoll::route('/create'),
            'view' => ViewUserPoll::route('/{record}'),
            'edit' => EditUserPoll::route('/{record}/edit'),
        ];
    }
}
