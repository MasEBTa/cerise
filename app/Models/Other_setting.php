<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_setting extends Model
{
    use HasFactory;

    protected $table = 'other_settings';
    protected $guarded = ['id'];
}
