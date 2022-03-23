<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Company;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=Cities::orderBy('name','ASC')->with('company')->paginate(10);
        return view('admin.city.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::orderBy('name','ASC')->whereNotIn('id',Cities::select('company_id')->get())->get();
        return view('admin.city.create',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_city=new Cities();
		$new_city->name=$request->name;
		$new_city->opis=$request->opis;
		$new_city->company_id=$request->company_id;
		$new_city->save();
		
		return redirect()->route('city.index')->withSuccess('Город успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(Cities $city)
    {
		//$city=Cities::with('company')->find($cities->id);
		
		//dd($city);
		
        return view('admin.city.show',['city'=>$city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function edit(Cities $city)
    {
        return view('admin.city.edit',['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cities $city)
    {
		$city->name=$request->name;
		$city->opis=$request->opis;
		$city->save();
	
        return redirect()->route('city.index')->withSuccess('Город '.$city->name.' успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cities $city)
    {
		// надо добавлять проверки, чтобы город нельзя было удалять, если у него пользователи и тд
		$city->delete();
		
        return redirect()->route('city.index')->withSuccess('Город '.$city->name.' успешно удален!');
    }
}
