<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_ref',
        'title',
        'description',
        'status',
        'category',
        'priority',
        'address',
        'rsp_id',
        'modem_id',
        'router_id',
        'technician_id',
        'date_closed',
    ];

    public function retail_service_provider(){
        return $this->belongsTo(RetailServiceProvider::class, 'rsp_id','id');
    }

    public function modem(){
        return $this->belongsTo(Modem::class, 'modem_id','id');
    }

    public function router(){
        return $this->belongsTo(Router::class, 'router_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
