<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampCusTable extends Model
{
    protected $table = 'campaign_customer';
    protected $primaryKey = 'campaign_customer_id';
    protected $fillable = ['campaign_customer_id','campaign_id','phone','telco','status','send_at',
                            'created_at','created_by','updated_at','updated_by'
    ];

    public function storeSms($cc)
    {
        return $this->insert($cc);
    }
}
