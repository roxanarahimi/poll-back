<?php

namespace App\Filament\Resources\UserPolls\Pages;

use App\Filament\Resources\UserPolls\UserPollResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserPolls extends ListRecords
{
    protected static string $resource = UserPollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
