<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kontraktor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kontraktor';

    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'email',
        'nomer_telepon',
        'alamat',
    ];

    public function proyek(): HasMany
    {
        return $this->hasMany(Proyek::class);
    }
}
