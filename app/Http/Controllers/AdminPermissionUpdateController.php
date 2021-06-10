<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminPermissionUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Role $role)
    {
        activity()->causedBy(auth()->user())->on($role)->log('permission updated');
        return $request->status ? $role->givePermissionTo($request->name) : $role->revokePermissionTo($request->name);
    }
}
