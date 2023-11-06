<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function getVacancyLevelAttribute() : VacancyLevel
    {
        return new VacancyLevel($this->remainingCount());
    }

    private function remainingCount(): int
    {
        return 0;
    }
}
