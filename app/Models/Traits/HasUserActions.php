<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait HasUserActions
{
    public static function bootHasUserActions()
    {
        static::creating(function ($model) {
            if (Auth::check() && !$model->created_by) {
                $model->created_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });

        static::deleting(function ($model) {
            if (Auth::check() && $model->isForceDeleting()) {
                $model->deleted_by = Auth::id();
                $model->save();
            }
        });

    }
}