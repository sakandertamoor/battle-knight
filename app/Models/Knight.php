<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knight extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'knights';

    protected $fillable = [
        'name',
        'age',
        'health'
    ];

    public function getNameAttribute($value): string
    {
        return ucfirst($value);
    }

    public function skills()
    {
        return $this->hasMany(KnightSkill::class, 'knight_id', 'id');
    }

    public function virtues()
    {
        return $this->hasMany(KnightVirtue::class, 'knight_id', 'id');
    }
}
