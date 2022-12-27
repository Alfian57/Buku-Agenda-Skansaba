<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use App\Filament\Resources\IncomingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncomingMails extends ListRecords
{
    protected static string $resource = IncomingMailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
