<?php

namespace App\Filament\Resources\OutgoingMailResource\Pages;

use App\Filament\Resources\OutgoingMailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOutgoingMail extends EditRecord
{
    protected static string $resource = OutgoingMailResource::class;

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