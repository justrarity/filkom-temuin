<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObReport extends Model
{
    protected $fillable = ['user_id','description','location','photo','is_read'];
    public function user() { return $this->belongsTo(User::class); }
}