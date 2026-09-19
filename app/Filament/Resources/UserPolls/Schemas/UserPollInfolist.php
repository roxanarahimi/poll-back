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

            ]);
    }
}
