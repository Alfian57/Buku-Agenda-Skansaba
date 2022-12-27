<?php

namespace App\Filament\Resources\OutgoingMailResource\Pages;

use App\Filament\Resources\OutgoingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutgoingMails extends ListRecords
{
    protected static string $resource = OutgoingMailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
