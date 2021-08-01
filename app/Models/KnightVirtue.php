<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnightVirtue extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'knight_virtues';

    public function virtue()
    {
        return $this->belongsTo(Skill::class, 'virtue_id', 'id');
    }

    public function knight()
    {
        return $this->belongsTo(Knight::class, 'knight_id', 'id');
    }
}
