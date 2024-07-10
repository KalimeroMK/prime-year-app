<?php

namespace App\Repositories;

use App\Interface\YearRepositoryInterface;
use App\Models\Year;
use Illuminate\Database\Eloquent\Collection;

class YearRepository implements YearRepositoryInterface
{
    public function all(): Collection
    {
        return Year::all();
    }

    public function findByYear($year): Year
    {
        return Year::where('year', $year)->first();
    }

    public function create(array $data)
    {
        return Year::create($data);
    }

    public function updateOrCreate(array $attributes, array $values = []): Year
    {
        return Year::updateOrCreate($attributes, $values);
    }
}