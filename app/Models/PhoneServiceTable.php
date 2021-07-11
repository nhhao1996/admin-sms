<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneServiceTable extends Model
{
    protected $table = 'phone_service';
    protected $primaryKey = 'id';
    protected $fillable =['id','telco','service_num'];

    public function getTel($num)
    {
        return $this->select('telco')
                    ->where('service_num',$num)
                    ->first();
    }
}
