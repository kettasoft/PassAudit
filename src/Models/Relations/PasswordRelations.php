<?php

namespace Kettasoft\PassAudit\Models\Relations;

use Illuminate\Support\Facades\Config;

trait PasswordRelations
{
    public function password()
    {
        return $this->morphOne(Config::get('passaudit.model'), 'clientable');
    }
}
