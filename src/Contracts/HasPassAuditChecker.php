<?php

namespace Kettasoft\PassAudit\Contracts;

interface HasPassAuditChecker
{
    public function checkPassAudit(string $password);
}
