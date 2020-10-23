<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class About extends Model {


protected $table    = 'abouts';
protected $fillable = [
		'id',
		'admin_id',
       'about_us_ar',
       'about_us_en',
        'features_ar',
        'features_en',
        'image',

	];

}
