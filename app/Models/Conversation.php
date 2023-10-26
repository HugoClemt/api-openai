<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversation';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_character'];
}
