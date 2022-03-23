<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	
	public function user(){
		return $this->belongsTo('App\Models\User','user_id');
	}
	
	public function city(){
		return $this->belongsTo('App\Models\Cities','id','company_id');
	}
	
	protected $fillable = [
        'name', 'contacts', 'opis'
    ];
}
