<?php

namespace App\Filament\Resources\UserPolls\Pages;

use App\Filament\Resources\UserPolls\UserPollResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUserPoll extends CreateRecord
{
    protected static string $resource = UserPollResource::class;
}
