<?php

namespace Kettasoft\PassAudit\Rules;

use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Rule;

class PassAuditRule extends PassAuditRuleChecker implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->check($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return Config::get('passaudit.rule.message');
    }
}
