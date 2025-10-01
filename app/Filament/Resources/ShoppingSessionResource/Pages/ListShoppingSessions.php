<?php

namespace App\Filament\Resources\ShoppingSessionResource\Pages;

use App\Filament\Resources\ShoppingSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoppingSessions extends ListRecords
{
    protected static string $resource = ShoppingSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
