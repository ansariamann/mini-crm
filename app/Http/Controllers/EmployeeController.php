<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        $companies = Company::all();

        return view('employee.index',['employees'=>$employees,'companies'=>$companies]);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'company_id' => 'required|integer|exists:companies,id',
            'profile_photo' => 'nullable|image|mimes:jpeg,png|max:10240'
        ]);
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_pictures', 'public');
        }
        

        Employee::create($data);

        return redirect()->route('employee.index');
  }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
                $companies = Company::all();

 

        return view('employee.edit',['employee'=>$employee,'companies'=>$companies,'company'=>$employee->company]);
          }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'company_id' => 'required|integer|exists:companies,id',
            'profile_photo' => 'nullable|image|mimes:jpeg,png|max:1024',
        ]);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_pictures', 'public');
        } else {
            unset($data['profile_photo']);
        }


        $employee->update($data);

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)

    {
        //
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
