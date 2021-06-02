<?php


namespace App\Products;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
