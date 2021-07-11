<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTable extends Model
{
    protected $table = 'brand';
    protected $primaryKey = 'brand_id';
    protected $fillables = ['brand_id','name','code','created_at','created_by','updated_at','updated_by'];

    public function getBrand()
    {
        return $this->select('brand_id','name')
                    ->get();                      
    }
}
