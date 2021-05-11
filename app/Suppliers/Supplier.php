<?php


namespace App\Suppliers;


use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
