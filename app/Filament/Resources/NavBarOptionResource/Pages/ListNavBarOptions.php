<?php

namespace App\Filament\Resources\NavBarOptionResource\Pages;

use App\Filament\Resources\NavBarOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNavBarOptions extends ListRecords
{
    protected static string $resource = NavBarOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
