<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardEmployeeController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.employee.index', [
            "active" => "employee",
            "employees" => Employee::where('is_deleted', false)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.employee.create', [
            "active" => "employee",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "position" => "required",
            "phone_number" => "required",
            "email" => "required",
            "photo" => "required"
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('employee-photo');

        $employee_id = Employee::create($validatedData)->id;
        return redirect('/dashboard/employee')->with('created', $employee_id);
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        return view('dashboard.admin.page.employee.edit', [
            "active" => "employee",
            "employee" => $employee
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "position" => "required",
            "phone_number" => "required",
            "email" => "required",
        ]);

        if ($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('employee-photo');
        }

        Employee::where('id', $employee->id)->update($validatedData);
        return redirect('/dashboard/employee')->with('updated', $employee->id);
    }

    public function destroy(Employee $employee)
    {
        Employee::where('id', $employee->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/employee')->with('deleted', $employee->name);
    }
}
