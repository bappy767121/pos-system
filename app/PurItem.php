<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurItem extends Model
{
    protected $fillable = [ 'product_id', 'pur_invoice_id', 'price', 'quantity', 'total' ];
    public function invoice()
    {
        return $this->belongsTo(PurInvoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
