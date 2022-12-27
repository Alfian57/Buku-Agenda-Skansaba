<?php

namespace App\Filament\Resources\OutgoingMailResource\Pages;

use App\Filament\Resources\OutgoingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOutgoingMail extends CreateRecord
{
    protected static string $resource = OutgoingMailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}