<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
		protected $fillable = [
			'user_id', 'username','picture', 'sex',	'phone', 'date_of_birth', 'address', 'country', 'state', 'town', 'paypal_email', 'bank_name', 'account_name', 'account_number'
		];
    
    public function user()
    {
    		return $this->belongsTo(User::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'user_id';
    //     return 'username';
    // }
}
