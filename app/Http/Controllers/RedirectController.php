<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\QRCodes;

class RedirectController extends Controller
{
    public function redirect($qrcode_id)
    {
		$qrcode=QRCodes::find($qrcode_id);
		$qrcode->count+=1;
		$qrcode->save();
		
		return Redirect::to($qrcode->ssil);       
    }
}
