<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;
use \App\Models\Supplier;

class Medicine extends Model
{
    use HasFactory;
    
     // Define the table name if it's not the plural of the model name
     protected $table = 'medicines';

   // Specify which attributes are mass assignable
    protected $fillable = [
        'medicine_name',
        'category_id',
        'supplier_id',
        'quantity',
        'unit_price',
        'expiry_date',
        'manufacturer',
    ];

    // Define the relationship: A medicine belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
