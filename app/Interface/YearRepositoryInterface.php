<?php

namespace App\Interface;

interface YearRepositoryInterface
{
    public function all();
    public function findByYear($year);
    public function create(array $data);
    public function updateOrCreate(array $attributes, array $values = []);
}