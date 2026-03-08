<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $companies = Company::paginate(10);
        return view('company.index', ['companies' => $companies  , 'employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('company.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|numeric',
            'website' => 'nullable|url',
            'company_id' => 'required|integer'
            
        ]);
        Company::create($data);

        return redirect()->route('company.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
   }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
        return view('company.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|numeric',
            'website' => 'nullable|url'
            
        ]);
        $company->update($data);
        return redirect()->route('company.index');

        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
        //
    }
    public function showEmployees(Company $company)
    {
        $employees = $company->employees;
        return view('employee.index', ['employees' => $employees]);
}
}