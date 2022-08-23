<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QRCodes;
use Illuminate\Http\Request;
use Auth;

class QRCodesController extends Controller
{
    public function index()
    {
        $qrcodes=QRCodes::where('company_id','=',Auth::user()->company_id)->orderBy('id','ASC')->paginate(10);
        return view('admin.qrcodes.index',['qrcodes'=>$qrcodes]);
    }
	
	public function create()
    {
        //$companies=Company::orderBy('name','ASC')->whereNotIn('id',Cities::select('company_id')->get())->get();
        return view('admin.qrcodes.create');
    }
	
	public function store(Request $request)
    {
        $new_city=new QRCodes();
		$new_city->name=$request->name;
		$new_city->ssil=$request->ssil;
		$new_city->company_id=Auth::user()->company_id;
		$new_city->save();
		
		return redirect()->route('qrcodes.index')->withSuccess('QR код успешно создан');
    }
	
	public function edit(QRCodes $qrcode)
    {
        return view('admin.qrcodes.edit',['qrcode'=>$qrcode]);
    }
	
	public function update(Request $request, QRCodes $qrcode)
    {
		// если получена переменная о сбросе счетсика, то сбрасываем его
		if ($request->clear=='true') {
			$qrcode->count=0;
			$qrcode->save();
			
			return redirect()->route('qrcodes.index')->withSuccess('Счетчик QR кода '.$qrcode->name.' успешно сброшен!');
		} else { 
		// иначе считаем, что идет сохранение данных 	
			$qrcode->name=$request->name;
			$qrcode->ssil=$request->ssil;
			$qrcode->save();
			
			return redirect()->route('qrcodes.index')->withSuccess('QR код '.$qrcode->name.' успешно изменен!');
		}
	
        
    }
	
	public function show(QRCodes $qrcode)
    {
		//$city=Cities::with('company')->find($cities->id);
		
		//dd($city);
		
        return view('admin.qrcodes.show',['qrcode'=>$qrcode]);
    }
	
	public function destroy(QRCodes $qrcode)
    {
		// надо добавлять проверки, чтобы город нельзя было удалять, если у него пользователи и тд
		$qrcode->delete();
		
        return redirect()->route('qrcodes.index')->withSuccess('QR код '.$qrcode->name.' успешно удален!');
    }
}
