<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        $currentUser = auth()->user();

        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->visible(fn ($record) => 
                    !$record->hasRole('Super_Admin') || $currentUser->hasRole('Super_Admin')
                ),
            Actions\ForceDeleteAction::make()
                ->visible(fn ($record) => 
                    !$record->hasRole('Super_Admin') || $currentUser->hasRole('Super_Admin')
                ),
            Actions\RestoreAction::make()
                ->visible(fn ($record) => 
                    !$record->hasRole('Super_Admin') || $currentUser->hasRole('Super_Admin')
                ),
        ];
    }
}
