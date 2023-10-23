<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    /* use HasFactory; */
    protected $table = 'universe';
    protected $fillable = ['id', 'name', 'description', 'image', 'id_user'];
}
