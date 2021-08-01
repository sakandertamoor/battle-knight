<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnightSkill extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'knight_skills';

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public function knight()
    {
        return $this->belongsTo(Knight::class, 'knight_id', 'id');
    }
}
