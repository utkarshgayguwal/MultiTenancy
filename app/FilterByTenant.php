<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait FilterByTenant
{
    public static function booted()
    {
        // dd(auth()->user());
        // $currentTenantId = auth()->user()->tenants->first()->id;
        // static::creating(function($model) use ($currentTenantId){
        //     $model->user_id = auth()->id();
        //     $model->tenant_id = $currentTenantId;
        // });

        // static::addGlobalScope(function (Builder $builder) use ($currentTenantId){
        //     $builder->where('tenant_id', $currentTenantId);
        // });

        // Use closure to defer until auth is available
        static::creating(function (Model $model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
                $model->tenant_id = auth()->user()->current_tenant_id;
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            if (auth()->check()) {
                $tenantId = auth()->user()->current_tenant_id;
                if ($tenantId) {
                    $builder->where('tenant_id', $tenantId);
                }
            }
        });
    }
}
