<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index'); 
    }

    public function search(Request $request)
    {
        $query = Employee::with('user');

        if ($request->employee_id) {
            $query->where('id', $request->employee_id); 
        }
        if ($request->user_id) {
            $query->where('user_id', $request->user_id); 
        }
        if ($request->name) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%'); 
            });
        }
        if ($request->role) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('role', 'like', '%' . $request->role . '%');
            });
        }
        if ($request->salary) {
            $query->where('salary', $request->salary); 
        }

        $employees = $query->get();

        return response()->json($employees->map(function ($employee) {
            return [
                'employee_id' => $employee->id,
                'user_id' => $employee->user->id,
                'name' => $employee->user->name,
                'role' => $employee->user->role,
                'salary' => $employee->salary,
            ];
        }));
    }
}
