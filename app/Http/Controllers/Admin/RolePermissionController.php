<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\TodoServices;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    protected $todoService;
    public function __construct(TodoServices $todoService)
    {
        $this->todoService = $todoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->todoService->roles();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->todoService->permissionAll();
        $users = $this->todoService->todoEmployees();
        return view('admin.roles.create',compact('users','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->permissions)){
            return back()->with('error','Checked at last one permission');
        }
        $role = Role::create(['name'=>$request->name]);
        foreach($request->permissions as $permission){
            $role->givePermissionTo($permission);
        }
        foreach($request->users as $user){
            $user = User::find($user);
            $user->assignRole($role->name);
        }
        return redirect()->route('roles.index')->with('message','Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        return back()->with('warning','Role Deleted Successfully');
    }
}
