<?php

namespace App\Filament\Resources\UserPolls\Pages;

use App\Filament\Resources\UserPolls\UserPollResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUserPoll extends ViewRecord
{
    protected static string $resource = UserPollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
