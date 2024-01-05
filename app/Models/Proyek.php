<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyek extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'proyek';

    protected $keyType = 'string';

    protected $fillable = [
        'kontraktor_id',
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function kontraktor(): BelongsTo
    {
        return $this->belongsTo(Kontraktor::class);
    }
}
