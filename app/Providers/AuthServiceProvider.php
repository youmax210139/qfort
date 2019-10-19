<?php

namespace App\Providers;

use TCG\Voyager\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    protected $excludeKeys = [
        'browse_compass',
        'browse_bread',
        'browse_database',
        'browse_media',
        'browse_admin',
        'browse_hooks',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissions = Permission::where('table_name', null)
            ->whereNotIn('key', $this->excludeKeys)
            ->get();
        foreach ($permissions as $p) {
            $gate = $p->key;
            Gate::define($gate, function ($user) use ($gate) {
                return $user->hasPermission($gate);
            });
        }
    }
}
