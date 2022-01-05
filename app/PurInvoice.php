<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurInvoice extends Model
{
    protected $fillable =['date', 'challan_no', 'note', 'user_id', 'admin_id',];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function items()
    {
        return $this->hasMany(PurItem::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
