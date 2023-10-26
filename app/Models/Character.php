<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = 'character';
    protected $fillable = ['id', 'name', 'description', 'image', 'id_universe'];

    public function toMap()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'id_universe' => $this->id_universe,
        ];
    }
}
