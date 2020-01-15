<?php

namespace App\Domain\Accounts\QueryBuilders;

<<<<<<< HEAD
use App\Domain\Core\BaseFilter;
use App\Domain\Accounts\Enums\UserRole;

=======
>>>>>>> initial
use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
<<<<<<< HEAD
    public function ofRole(UserRole $userRole)
    {
        return $this->whereHas('roles', function(Builder $query) use ($userRole) {
            $query->where('slug', '=', $userRole->getValue());
        });
    }

    public function filter(BaseFilter $filter)
    {
        return $filter->apply($this);
    }
=======

>>>>>>> initial
}
