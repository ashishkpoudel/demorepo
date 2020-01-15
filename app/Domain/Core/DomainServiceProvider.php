<?php

namespace App\Domain\Core;

use App\Domain\Accounts\Models\User;
use App\Domain\Accounts\Policies\UserAuthPolicy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Relations\Relation;

class DomainServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserAuthPolicy::class
    ];

    public function register()
    {
        parent::register();
    }

    public function boot()
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }

        Relation::morphMap([

        ]);
    }
}
