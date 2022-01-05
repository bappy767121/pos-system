<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recive extends Model
{
    protected $fillable =['date', 'amount', 'note', 'user_id', 'admin_id','sel_invoice_id',];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
