<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignTable extends Model
{
    protected $table = 'campaign';
    protected $primaryKey = 'campaign_id';
    protected $fillable = [
        'campaign_id', 'type', 'brand_id', 'content', 'send_type', 'send_at',
        'is_deleted', 'is_active', 'status', 'created_at', 'created_by'
    ];

    public function storeSms($sms)
    {
        return $this->create($sms)->{$this->primaryKey};
    }
}
