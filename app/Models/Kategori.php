<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'nama_kategori',
        'slug',
        'deskripsi',
    ];

    // Jika Anda memiliki cast untuk deleted_at, bisa ditambahkan
    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}