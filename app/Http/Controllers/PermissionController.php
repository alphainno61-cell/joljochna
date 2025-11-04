<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('groupby', 'ASC')->get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {

        $permissions = [

            'View Dashboard',

            'View Permission',
            'Create Permission',
            'Edit Permission',
            'Delete Permission',

            "View Role",
            'Create Role',
            'Edit Role',
            'Delete Role',

            'View AssignRole',
            'Create AssignRole',
            'Edit AssignRole',
            'Delete AssignRole',

            'View Booking',
            'Create Booking',
            'Edit Booking',
            'Delete Booking',

            'View Plot',
            'Create Plot',
            'Edit Plot',
            'Delete Plot',

            'View Customer',
            'Create Customer',
            'Edit Customer',
            'Delete Customer',

            'View Report',
            'Create Report',
            'Edit Report',
            'Delete Report',

            'View Setting',
            'Create Setting',
            'Edit Setting',
            'Delete Setting',


        ];


        $groupby = [
            'Dashboard',
            'Permission',
            'Role',
            'AssignRole',
            'Booking',
            'Plot',
            'Customer',
            'Report',
            'Setting',
        ];

        return view('admin.permissions.create', compact('permissions', 'groupby'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name|min:3',
            'groupby' => 'required'
        ]);


        if ($validator->passes()) {
            Permission::create([
                'name' => $request->name,
                'groupby' => $request->groupby
            ]);

            return redirect()->route('permissions')->with('success', 'Permission Create');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    public function edit(string $id)
    {


        $permissions = [

            'View Dashboard',

            'View Permission',
            'Create Permission',
            'Edit Permission',
            'Delete Permission',

            "View Role",
            'Create Role',
            'Edit Role',
            'Delete Role',

            'View AssignRole',
            'Create AssignRole',
            'Edit AssignRole',
            'Delete AssignRole',

            'View Booking',
            'Create Booking',
            'Edit Booking',
            'Delete Booking',

            'View Plot',
            'Create Plot',
            'Edit Plot',
            'Delete Plot',

            'View Customer',
            'Create Customer',
            'Edit Customer',
            'Delete Customer',

            'View Report',
            'Create Report',
            'Edit Report',
            'Delete Report',

            'View Setting',
            'Create Setting',
            'Edit Setting',
            'Delete Setting',


        ];


        $groupby = [
            'Dashboard',
            'Permission',
            'Role',
            'AssignRole',
            'Booking',
            'Plot',
            'Customer',
            'Report',
            'Setting',
        ];

        $permissionId = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permissions', 'permissionId', 'groupby'));
    }



    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('permissions', 'name')->ignore($id)
            ],

            'groupby' => 'required'
        ]);


        if ($validator->passes()) {
            Permission::findOrFail($id)->update([
                'name' => $request->name,
                'groupby' => $request->groupby
            ]);

            return redirect()->route('permissions')->with('success', 'Permission Updated');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);

        if (count($permission->roles) > 0) {
            return redirect()->back()->with('error', 'You Cant delete this! It has Roles');
        }

        $permission->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
