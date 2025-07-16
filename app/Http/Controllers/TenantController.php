<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function __invoke($tenantId){
        //Check Tenant
        $tenant = auth()->user()->tenants()->findOrFail($tenantId);

        //Change Tenant
        auth()->user()->update(['current_tenant_id' => $tenantId]);

        //Redirect to Dashboard
        // return redirect()->route('dashboard');
        $tenantDomain = str_replace('://', '://' . $tenant->subdomain . '.', config('app.url')); 
        return redirect($tenantDomain . route('dashboard', absolute: false));
    }
}
