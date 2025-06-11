<?php

namespace App\Filament\Resources\NavBarOptionResource\Pages;

use App\Filament\Resources\NavBarOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNavBarOption extends EditRecord
{
    protected static string $resource = NavBarOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
