<?php

namespace Kettasoft\PassAudit\Exceptions;

class ModelDoesntHasPassAuditInterface extends \Exception
{
    /**
     * Constructs the Exception.
     *
     * @param string $message The Exception message to throw.
     * @param int $code The Exception code.
     * @param \Throwable|null $previous The previous exception used for the exception chaining.
     */
    function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
