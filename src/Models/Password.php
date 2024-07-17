<?php

namespace Kettasoft\PassAudit\Models;

use Illuminate\Database\Eloquent\Model;
use Kettasoft\PassAudit\Models\Relations\PasswordRelations;

class Password extends Model
{
    use PasswordRelations;

    protected $fillable = ['clientable_id', 'clientable_type', 'password', 'created_at'];

    protected $casts = [
        'password' => 'string',
    ];

    protected $dates = ['created_at'];

    /**
     * Password Construct
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('passaudit.table');
    }
}
