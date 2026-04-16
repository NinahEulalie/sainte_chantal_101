<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //show permissions page
    public function index()
    {   $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('permissions.list', [
            'permissions' => $permissions
        ]);
    }
    //create permissions page
    public function create()
    {
        return view('permissions.create');
    }
    //insert a permissions in DB
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()){
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.list')->with('success', 'Permission added successfully');
        }else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }
    //edit permissions page
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', [
            'permission' => $permission
        ]);
    }
    //update permissions page
    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name,'.$id.',id|min:3'
        ]);

        if ($validator->passes()){
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permissions.list')->with('success', 'Permission updated successfully');
        }else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }
    //delete permissions page
    public function destroy(Request $request)
    {
        $permission = Permission::find($request->id);
        if ($permission == null) {
            session()->flash('error', 'Permission not found test');
            return response()->json([
                'status' => false
            ]);
        }
        $permission->delete();
            session()->flash('success', 'Deleted successfully test');
            return response()->json([
                'status' => true
            ]);
    }
}
