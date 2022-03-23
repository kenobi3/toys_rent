<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\Cities;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$companies=Company::with('user','city')->orderBy('name','ASC')->paginate(10);
		
		//dd ($companies);
        return view('admin.company.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$users=User::orderBy('name','ASC')->whereNotIn('id',Company::select('user_id')->get())->get();
        return view('admin.company.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_company=new Company();
		$new_company->name=$request->name;
		$new_company->opis=$request->opis;
		$new_company->contacts=$request->contacts;
		$new_company->user_id=$request->user_id;
		$new_company->save();
		
		return redirect()->route('company.index')->withSuccess('Компания успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
		//dd($company);
        return view('admin.company.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
		$company->name=$request->name;
		$company->opis=$request->opis;
		$company->contacts=$request->contacts;
		$company->save();
		
		return redirect()->route('company.index')->withSuccess('Компания '.$company->name.' успешно изменена');
    }
	
	public function block($idc, $sts)
    {
		$company=Company::find($idc);
		$company->block=$sts;
		$company->save();
		
		if ($sts==1) {
			$action_txt='заблокирована';
		} else {
			$action_txt='разблокирована';
		}
		
		return redirect()->route('company.show',$idc)->withSuccess('Компания '.$company->name.' успешно '.$action_txt);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
		if(Cities::where('company_id','=',$company->id)->count()!=0)
		{
			return redirect()->route('company.index')->withErrors('Компания '.$company->name.' не может быть удалена, так как она имеется в городе '.$company->city->name.'!');
		}
		
		/// добавить проверку на товары и тд, всю информацию, которая может быть отнесена к компании
	
		$company->delete();
        return redirect()->route('company.index')->withSuccess('Компания '.$company->name.' успешно удалена!');
    }
}
