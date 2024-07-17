<?php

namespace Kettasoft\PassAudit;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Kettasoft\PassAudit\Models\Password;

trait PassAuditRelations
{
    /**
     * Client passowrd relationships
     * @return MorphMany
     */
    public function passwords()
    {
        return $this->morphMany(Password::class, 'clientable');
    }
}
