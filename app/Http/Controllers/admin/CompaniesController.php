<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->get();
        return view('backend.companies.index', compact('companies'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:companies,slug,except,id',
        ]);
        try {
            Company::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
            ]);
            return redirect()->back()->with('success', 'Your Product Company has been added successfully');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('backend.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        try {
            if ($request->slug != $company->slug) {
                $request->validate([
                    'slug' => 'unique:companies,slug,except,id'
                ]);
            }

            $company->update([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
            ]);


            return redirect()->back()->with('success', 'Your Product Company has been updated successfully');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Your product company has been deleted successfully');
    }
}
