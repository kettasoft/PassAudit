<?php

namespace Kettasoft\PassAudit\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kettasoft\PassAudit\Contracts\HasPassAuditChecker;
use Kettasoft\PassAudit\PassAudit;

class User extends Authenticatable implements HasPassAuditChecker
{
    use PassAudit, HasFactory;
    protected $fillable = [
        'email',
        'password'
    ];
}
