<?php

namespace App\Models;
use \App\Models\Medicine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'supplier_name',
        'contact_info',
        'image'
    ];

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
