<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nip', 'nama_guru', 'jenis_kelamin', 'email', 'no_hp'];
}