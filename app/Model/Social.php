<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Social extends Model {



protected $table    = 'socials';
protected $fillable = [
		'id',
		'admin_id',
        'whatsapp',
        'facebook',
        'youtube',
        'linked',
        'instagram',


	];

}
