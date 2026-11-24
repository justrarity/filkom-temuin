<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'category_id', 'color', 'description', 'special_features',
        'found_location', 'found_at', 'photo', 'storage_location_id',
        'reporter_id', 'status', 'created_by',
    ];

    protected $casts = ['found_at' => 'datetime'];

    public function category()        { return $this->belongsTo(Category::class); }
    public function storageLocation() { return $this->belongsTo(StorageLocation::class); }
    public function reporter()        { return $this->belongsTo(Reporter::class); }
    public function pickup()          { return $this->hasOne(Pickup::class); }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'baru_ditemukan'      => 'Baru ditemukan',
            'menunggu_verifikasi' => 'Menunggu verifikasi',
            'tersimpan'           => 'Tersimpan di Security',
            'sudah_dikembalikan'  => 'Sudah dikembalikan',
            default               => $this->status,
        };
    }

    public function getStatusClassAttribute(): string
    {
        return 'badge-' . $this->status;
    }
}