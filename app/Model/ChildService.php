<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ChildService extends Model {

protected $table    = 'child_services';
protected $fillable = [
		'id',

        'name_ar',
        'name_en',
        'image',
        'service_id',

		'created_at',
		'updated_at',
	];

   public function service(){
      return $this->belongsTo(\App\Model\Service::class,'service_id','id');
   }

    public function subChildServices(){
        return $this->hasMany(\App\Model\SubChildService::class,'child_service_id','id');
    }

}
