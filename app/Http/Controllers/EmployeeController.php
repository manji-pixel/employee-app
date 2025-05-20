<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Language;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employees.index')->with('employeee', $employee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lanaguages = Language::get()->toArray();
        return view('employees.create', compact('lanaguages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try {
            return $request->all();
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->willing_to_work = $request->willing_to_work;
            foreach ($request->languages_known as $lang) {
                $employee->languages_known = $lang;
            }
            $employee->save();
            return view('employees.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $employee = Employee::find($request->id);
        $languages = Language::get();
        return view('employees.edit', compact('employee', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        try {
            $employee = Employee::find($request->id);
            $employee->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'willing_to_work' => $request->willing_to_work,
            ]);
            return view('employees.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
