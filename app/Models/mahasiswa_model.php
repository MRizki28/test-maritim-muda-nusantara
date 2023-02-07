<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa_model extends Model
{
    use HasFactory;

    protected $table = 'tb_mahasiswa';
    protected $fillable = [
        'id' , 'nama_mahasiswa','nim','created_at','updated_at'
    ];
}
