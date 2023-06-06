<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_download extends Model
{
    use HasFactory;

    protected $table = 'daftar_download';
    protected $guarded = ['id'];
}
