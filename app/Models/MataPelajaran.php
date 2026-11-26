<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    protected $fillable = ['kode_mapel', 'nama_mapel', 'kkm'];

    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
}