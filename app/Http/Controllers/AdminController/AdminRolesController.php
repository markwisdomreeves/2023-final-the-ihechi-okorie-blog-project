<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Permission;
use App\Models\Role;


class AdminRolesController extends Controller{

    private $rules = ['name' => 'required|unique:roles,name'];

    public function index(){
        return view('admin.roles.index', [
            'roles' => Role::orderBy('id', 'desc')->paginate(5),
        ]);
    }
    
    public function create(){
        return view('admin.roles.create', [
            'permissions' => Permission::all()
        ]);
    }
    
    public function store(Request $request){
        $validated = $request->validate($this->rules);
        $permissions = $request->input('permissions');
        
        $role = Role::create($validated);
        $role->permissions()->sync( $permissions );

        return redirect()->route('admin.roles.create')->with('success', 'Role has been created Successfully');
    }

    public function edit(Role $role){
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }
    
    public function update(Request $request, Role $role){
        $this->rules['name'] = ['required', Rule::unique('roles')->ignore($role)];
        $validated = $request->validate($this->rules);
        $permissions = $request->input('permissions');
        
        $role->update($validated);
        $role->permissions()->sync( $permissions );
        
        return redirect()->route('admin.roles.edit', $role)->with('success', 'Role has been updated Successfully');
    }
    
    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role has been deleted Successfully');
    }
}
