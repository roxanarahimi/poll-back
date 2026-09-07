<?php

namespace App\Filament\Resources\UserPolls\Pages;

use App\Filament\Resources\UserPolls\UserPollResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUserPoll extends EditRecord
{
    protected static string $resource = UserPollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
