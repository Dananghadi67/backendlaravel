<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailData extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'foto_ktp',
        'umur'
    ];
}