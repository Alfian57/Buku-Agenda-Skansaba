<?php

namespace App\Filament\Resources\IncomingMailResource\Pages;

use App\Filament\Resources\IncomingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncomingMail extends EditRecord
{
    protected static string $resource = IncomingMailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}