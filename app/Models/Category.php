<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getIconAttribute(): string
    {
        return match ($this->name) {
            'Elektronik'     => '💻',
            'Aksesori'       => '🎧',
            'Alat Tulis'     => '✏️',
            'Dokumen'        => '📄',
            'Pakaian'        => '👕',
            'Barang Pribadi' => '🎒',
            default          => '📦',
        };
    }
}