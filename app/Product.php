<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
	protected $primaryKey='id';
	protected $fillable=['pro_name','pro_code','pro_price','pro_info','stock','category_id','image','sp1_price'];
}
