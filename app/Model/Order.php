<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Order extends Model {

protected $table    = 'orders';
protected $fillable = [
		'id',

        'name',
        'email',
        'phone',
        'service',

        'file',
        'message',
		'created_at',
		'updated_at',
	];

}
