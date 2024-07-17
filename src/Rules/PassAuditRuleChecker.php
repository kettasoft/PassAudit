<?php

namespace Kettasoft\PassAudit\Rules;

use Illuminate\Support\Facades\Auth;
use Kettasoft\PassAudit\Contracts\HasPassAuditChecker;
use Kettasoft\PassAudit\Exceptions\ModelDoesntHasPassAuditInterface;

class PassAuditRuleChecker
{
    /**
     * 
     * @param string $password
     * @return bool
     */
    public function check(string $password)
    {
        $user = Auth::user();

        if (!($user instanceof HasPassAuditChecker)) {
            throw new ModelDoesntHasPassAuditInterface('The user does not implement HasPassAuditChecker interface.');
        }

        return $user->checkPassAudit($password);
    }
}
