<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
