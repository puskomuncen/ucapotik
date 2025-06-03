<?php

namespace PHPMaker2025\apotik2025baru;

use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * User activated by Login Link but login is required
 */
class UserActivatedException extends AuthenticationException
{
}
