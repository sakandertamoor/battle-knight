<?php

namespace App\Repositories;

use App\Domain\Knight;
use App\Domain\Skill;
use App\Domain\Virtue;
use App\Interfaces\KnightRepositoryInterface;
use App\Models\Knight as KnightModel;
use App\Models\KnightSkill;
use App\Models\KnightVirtue;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class KnightRepository implements KnightRepositoryInterface
{
    public function get(int $knightId): ?Knight
    {
        $knight = KnightModel::find($knightId);
        if(is_null($knight)) {
            return null;
        }

        return new Knight(
            $knight->name,
            $knight->age,
            $knight->health,
            $this->mapVirtues($knight->virtues),
            $this->mapSkills($knight->skills)
        );
    }

    public function add(Knight $knight): ?int
    {
        DB::beginTransaction();

        try {

            $knightId = KnightModel::create([
                'name' => $knight->getName(),
                'age' => $knight->getAge(),
                'health' => $knight->getHealth()
            ]);

            $skills = [
                [
                    'knight_id' => $knightId,
                    'skill_id' => 1,
                ]
            ];
            KnightSkill::insert($skills);

            $virtues = [
                [
                    'knight_id' => $knightId,
                    'virtue_id' => 1,
                ]
            ];

            KnightVirtue::insert($virtues);

        } catch (Exception $e) {
            DB::rollback();
            return null;
        }

        DB::commit();

        return $knightId;
    }

    /**
     * @param Collection $skills
     * @return Skill[]
     */
    private function mapSkills(Collection $skills): array
    {
        return $skills->map(function ($skill) {
            return new Skill($skill->skill->name, $skill->value);
        })->all();
    }

    /**
     * @param Collection $virtues
     * @return Virtue[]
     */
    private function mapVirtues(Collection $virtues): array
    {
        return $virtues->map(function ($virtue) {
            return new Skill($virtue->virtue->name, $virtue->value);
        })->all();
    }
}
