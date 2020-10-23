<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class SubChildService extends Model {

protected $table    = 'sub_child_services';
protected $fillable = [
		'id',

        'name_en',
        'name_ar',
        'child_service_id',

		'created_at',
		'updated_at',
	];

   public function child_service(){
      return $this->belongsTo(\App\Model\ChildService::class,'child_service_id','id');
   }

}
