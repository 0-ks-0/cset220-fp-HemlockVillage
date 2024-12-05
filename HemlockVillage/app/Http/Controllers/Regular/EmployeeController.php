<?php

namespace App\Http\Controllers\Regular;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
{
    $employees = Employee::with('user')->get(); // Fetch employees with related user info

    // Pass the data to the view
    return view('employeeinfo', compact('employees'));
}

public function updateSalary(Request $request, $id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return response()->json(['error' => 'Employee not found'], 404);
    }

    $request->validate([
        'new_salary' => 'required|numeric|min:0'
    ]);

    $employee->salary = $request->new_salary;
    $employee->save();

    return response()->json(['message' => 'Salary updated successfully']);
}

    

    // Handle employee search functionality
    public function search(Request $request)
    {
        $query = Employee::with('user'); // Load user data associated with the employee

        // Filtering by the fields
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

        // Get the filtered employees
        $employees = $query->get();

        // Return filtered employees in JSON format (if needed)
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
    public function show($id)
    {
        $employee = Employee::with(['user', 'user.role'])->find($id);
    
        if (!$employee) {
            return redirect()->route('employeeinfo.index')->with('error', 'Employee not found');
        }
    
        return view('employeeinfo', compact('employee'));
    }
    

}
