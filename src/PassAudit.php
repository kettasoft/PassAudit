<?php

namespace Kettasoft\PassAudit;

use Illuminate\Support\Facades\Hash;
use Kettasoft\PassAudit\PassAuditRelations;
use Kettasoft\PassAudit\Traits\PassAuditWatcher;

trait PassAudit
{
    use PassAuditRelations, PassAuditWatcher;

    public function checkPassAudit(string $originalPassword): bool
    {
        $passwords = $this->getPasswords();

        foreach ($passwords as $password) {
            if (Hash::check($originalPassword, $password->password)) {
                return true;
            }
        }

        return false;
    }

    public function getPasswords()
    {
        return $this->passwords()->get(['password', 'created_at']);
    }

    /**
     * Get current user password
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
