<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $fillable = ['item_id','taker_name','taker_identity','notes','verified_by','picked_at'];
    protected $casts = ['picked_at' => 'datetime'];

    public function item()     { return $this->belongsTo(Item::class); }
    public function verifier() { return $this->belongsTo(User::class, 'verified_by'); }
}