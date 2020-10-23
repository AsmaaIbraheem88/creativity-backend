<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Portfolio extends Model {

protected $table    = 'portfolios';
protected $fillable = [
		'id',
        'name',
        'client',
        'image',
        'service_id',

		'created_at',
		'updated_at',
	];

   public function service(){
      return $this->belongsTo(\App\Model\Service::class,'service_id','id');
   }

}
