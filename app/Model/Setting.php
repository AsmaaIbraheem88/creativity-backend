<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'sitename_en',
		'email',
        'tel',
        'address_ar',
        'address_en',
		'logo',
		'icon',
		'system_status',
		'system_message',
        'footer_message_ar',
        'footer_message_en',
        'keywords',
        'description'
	];

}
