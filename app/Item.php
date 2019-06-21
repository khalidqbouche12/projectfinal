<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    //
    use SoftDeletes;
    
	protected $fillable=['title','body','image','user_id'];
 	protected $dates = ['deleted_at'];


 	public function user(){
 		return $this->belongsTo('App\User');
 	}
}
