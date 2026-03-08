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
    public function create(Request $request)
    {
       

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
            'logo' => 'nullable|image|mimes:jpeg,png|min:100,100',
            'website' => 'nullable|url',
            
        ]);
        $data['company_id'] = random_int(1000, 9999);
        
        \Illuminate\Support\Facades\Validator::make($data, ['company_id' => 'unique:companies,company_id'])->validate();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        Company::create($data);

        return redirect()->route('company.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
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
            'logo' => 'nullable|image|mimes:jpg,png,gif|max:10240',
            'website' => 'nullable|url'
            
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
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
        $employees = $company->employees()->paginate(10);
        return view('employee.index', ['employees' => $employees]);
}
}