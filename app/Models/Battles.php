<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battles extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'battles';

    protected $fillable = [
        'status'
    ];

    public function player()
    {
        return $this->belongsTo(Knight::class, 'player_id');
    }

    public function opponent()
    {
        return $this->belongsTo(Knight::class, 'opponent_id');
    }

    public function winner()
    {
        return $this->belongsTo(Knight::class, 'winner_id');
    }

    public function attacks()
    {
        return $this->hasMany(BattleAttacks::class, 'battle_id', 'id');
    }
}
