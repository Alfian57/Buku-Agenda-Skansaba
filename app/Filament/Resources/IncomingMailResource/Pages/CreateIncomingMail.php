<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use App\Filament\Resources\IncomingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIncomingMail extends CreateRecord
{
    protected static string $resource = IncomingMailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}