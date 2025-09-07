<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolesResource\Pages;
use App\Filament\Resources\RolesResource\RelationManagers;
use App\Models\Permission;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RolesResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'eos-role-binding-o';

    protected static ?string $navigationGroup = 'Roles and Permissions';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Select::make('permissions')
                    ->relationship('permissions', 'name')
                    ->options(function () {
                        $allPermissions = Permission::all()
                            ->groupBy(fn($p) => explode('.', $p->name)[0]);

                        $options = [];

                        // General
                        $generalOptions = ['all' => 'All permissions'];
                        foreach ($allPermissions as $resource => $group) {
                            $generalOptions["{$resource}.all"] = "All {$resource}";
                        }
                        $options['General'] = $generalOptions;

                        foreach ($allPermissions as $resource => $group) {
                            $options[ucfirst($resource)] = $group->pluck('name', 'id')->toArray();
                        }

                        return $options;
                    })
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->afterStateHydrated(function ($component, $state, $record) {
                        if (!$record)
                            return;

                        $permissionIds = $record->permissions()->pluck('id')->toArray();
                        $allPermissions = Permission::all()->groupBy(fn($p) => explode('.', $p->name)[0]);

                        if (count($permissionIds) === Permission::count()) {
                            $component->state(['all']);
                            return;
                        }

                        $newState = [];

                        foreach ($allPermissions as $resource => $group) {
                            $resourceIds = $group->pluck('id')->toArray();

                            if (!array_diff($resourceIds, $permissionIds)) {
                                $newState[] = "{$resource}.all";
                                $permissionIds = array_diff($permissionIds, $resourceIds);
                            }
                        }

                        $newState = array_merge($newState, $permissionIds);

                        $component->state($newState);
                    })
                    ->saveRelationshipsUsing(function ($state, $record) {
                        if (!$state) {
                            $record->permissions()->sync([]);
                            return;
                        }

                        if (in_array('all', $state)) {
                            $record->permissions()->sync(Permission::pluck('id'));
                            return;
                        }

                        $permissionIds = [];

                        foreach ($state as $val) {
                            if (str_ends_with($val, '.all')) {
                                $resource = explode('.', $val)[0];
                                $ids = Permission::where('name', 'like', "{$resource}.%")
                                    ->pluck('id')
                                    ->toArray();
                                $permissionIds = array_merge($permissionIds, $ids);
                            } elseif (is_numeric($val)) {
                                $permissionIds[] = $val;
                            }
                        }

                        $record->permissions()->sync($permissionIds);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                BadgeColumn::make('permissions.name')
                    ->label('Permissions')
                    ->getStateUsing(function ($record) {
                        if (!$record)
                            return [];

                        $userPermissionIds = $record->permissions->pluck('id')->toArray();
                        $allPermissions = Permission::all();
                        $allPermissionCount = $allPermissions->count();

                        $display = [];

                        if (count($userPermissionIds) === $allPermissionCount) {
                            return ['All permissions'];
                        }

                        $grouped = $allPermissions->groupBy(fn($p) => explode('.', $p->name)[0]);
                        $remainingIds = $userPermissionIds;

                        foreach ($grouped as $resource => $group) {
                            $resourceIds = $group->pluck('id')->toArray();

                            if (!array_diff($resourceIds, $remainingIds)) {
                                $display[] = "All {$resource}";
                                $remainingIds = array_diff($remainingIds, $resourceIds);
                            }
                        }

                        if (!empty($remainingIds)) {
                            $remainingNames = Permission::whereIn('id', $remainingIds)->pluck('name')->toArray();
                            $display = array_merge($display, $remainingNames);
                        }

                        return $display;
                    })
                    ->colors([
                        'primary',
                    ])
                    ->wrap(),

                // Tables\Columns\TextColumn::make('guard_name')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updater.name')
                    ->label('Updated By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleter.name')
                    ->label('Deleted By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRoles::route('/create'),
            'view' => Pages\ViewRoles::route('/{record}'),
            'edit' => Pages\EditRoles::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
