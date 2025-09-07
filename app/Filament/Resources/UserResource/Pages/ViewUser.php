<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        $currentUser = auth()->user();

        return [
            Actions\EditAction::make()
                ->visible(fn ($record) => 
                    !$record->hasRole('Super_Admin') || $currentUser->hasRole('Super_Admin')
                ),
        ];
    }
}
