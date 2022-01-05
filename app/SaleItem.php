<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [ 'product_id', 'sel_invoice_id', 'price', 'quantity', 'total' ];
    public function invoice()
    {
        return $this->belongsTo(SelInvoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
