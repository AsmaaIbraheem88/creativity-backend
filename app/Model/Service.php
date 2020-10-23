<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Service extends Model {



protected $table    = 'services';
protected $fillable = [
		'id',
		'admin_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'active',

		'created_at',
		'updated_at',
		'deleted_at',
	];


    public function childServices(){
        return $this->hasMany(\App\Model\ChildService::class,'service_id','id');
    }

    public function portfolios(){
        return $this->hasMany(\App\Model\Portfolio::class,'service_id','id');
    }
}


