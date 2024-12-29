<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function showEmployee ()
    {
        $employees = User::where('role', '!=', 'admin')->get();
        return view ('backend.employee.show-employee', compact('employees'));
    }

    public function createEmployee ()
    {
        return view ('backend.employee.create-employee');
    }

    public function storeEmployee (Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();
        toastr()->success("New employee is added successfully!");
        return redirect()->back();
    }

    public function editEmployee ($id)
    {
        $employee = User::find($id);
        return view ('backend.employee.edit-employee', compact('employee'));
    }

    public function updateEmployee (Request $request, $id)
    {
        $employee = User::find($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        if(isset($request->password)){
            $employee->password = Hash::make($request->password);
        }
        $employee->role = $request->role;

        $employee->save();
        toastr()->success("Employee is updated successfully!");
        return redirect()->back();


    }
}
