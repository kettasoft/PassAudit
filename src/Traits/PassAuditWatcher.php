<?php

namespace Kettasoft\PassAudit\Traits;

use Illuminate\Support\Facades\Hash;

trait PassAuditWatcher
{
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($user) {
            if ($user->isDirty('password')) {
                $user->passwords()->create(['password' => Hash::make($user->getPassword())]);
            }
        });
    }
}
