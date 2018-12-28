<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['prefix', 'invoice_number', 'amount', 'note', 'cancelled', 'invoice_nc_number', 'invoce_nc_prefix', 'manual', 'reason'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function isCancelled()
    {
        return $this->cancelled;
    }
}
