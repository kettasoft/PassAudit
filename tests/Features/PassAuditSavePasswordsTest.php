<?php

// namespace PassAudit\Tests\Features;

use Kettasoft\PassAudit\Tests\Models\User;
use function PHPUnit\Framework\assertEquals;

use Kettasoft\PassAudit\Rules\PassAuditRule;

/**
 * This test ensures that when a user's password is changed and saved, the system correctly stores a record of the password change.
 * The test creates a new user, updates the user's password, and saves the user.
 * It then verifies that the password change has been recorded by checking that the count of the user's passwords is equal to one.
 * This helps confirm that password change history is being maintained properly.
 */
test('Check if passwords saved on change user password.', function () {
    $user = User::factory()->create();

    $user->password = 'test123';

    $user->save();

    assertEquals(1, ($user->passwords()->count()));
});

/**
 * This test verifies that the custom validation rule PassAuditRule correctly validates a password.
 * It first creates and authenticates a user.
 * Then, it sets and saves the user's password.
 * The test creates an instance of PassAuditRule and checks if the rule's passes method returns true when validating the password.
 * This ensures that the PassAuditRule works as expected when validating a user's password.
 */
test('Test PassAudit rule validation.', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $user->password = 'password';

    $user->save();

    $rule = new PassAuditRule;

    expect($rule->passes('password', 'password'))->toBeTrue();
});
