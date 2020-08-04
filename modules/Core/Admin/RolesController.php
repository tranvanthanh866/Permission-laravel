<?php

namespace Modules\Core\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Core\Requests\Admin\StoreRolesRequest;
use Modules\Core\Requests\Admin\UpdateRolesRequest;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'permission:'.config('const.permissions.USERS_MANAGE')]);
    }

    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::all();

        return view('Core::admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::get()->pluck('name', 'name');

        return view('Core::admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {

        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get()->pluck('name', 'name');

        return view('Core::admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {

        $role->load('permissions');

        return view('Core::admin.roles.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
