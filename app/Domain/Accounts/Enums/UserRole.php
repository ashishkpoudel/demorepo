<?php

namespace App\Domain\Accounts\Enums;

use MyCLabs\Enum\Enum;

class UserRole extends Enum
{
    private const USER = 'user';

    private const ADMIN = 'admin';

    private const COMMUNITY_MANAGER = 'community-manager';

    private const TOUR_OPERATOR = 'tour-operator';

    public static function USER()
    {
        return new UserRole('user');
    }

    public static function ADMIN()
    {
        return new UserRole('admin');
    }

    public static function COMMUNITY_MANAGER()
    {
        return new UserRole('community-manager');
    }

    public static function TOUR_OPERATOR()
    {
        return new UserRole('tour-operator');
    }
}
