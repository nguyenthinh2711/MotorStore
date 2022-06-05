<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //
    protected $table = "suppliers";
    protected $fillable = [
        'SupplierName',
        'Address',
        'Phone',
        'Email'
    ];
    protected $primaryKey = 'id';
    public function products()
    {
        return $this->hasMany("App\Models\Products","Sup_Id");
    }
}
