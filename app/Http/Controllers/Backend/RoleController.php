<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showEmployee ()
    {
        $employees = User::where('role', 'employee')->get();
        return view ('backend.employee.show-employee', compact('employees'));
    }
}
