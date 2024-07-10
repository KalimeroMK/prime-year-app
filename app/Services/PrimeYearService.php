<?php

namespace App\Services;

use App\Interface\YearRepositoryInterface;
use Illuminate\Support\Facades\Crypt;

class PrimeYearService
{
    protected YearRepositoryInterface $yearRepository;

    public function __construct(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepository = $yearRepository;
    }

    public function processYear($year): void
    {
        $primes = $this->getPrimes($year);
        $this->storePrimeYears($primes);
    }

    private function getPrimes($startYear = null): array
    {
        $primes = [];
        $count = 0;
        $currentYear = $startYear ?? date('Y');

        while ($count < 30) {
            if ($this->isPrime($currentYear)) {
                $primes[] = $currentYear;
                $count++;
            }
            $currentYear--;
        }

        return $primes;
    }

    private function isPrime($num): bool
    {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }

    private function storePrimeYears($years): void
    {
        foreach ($years as $year) {
            $christmasDay = date('l', strtotime("$year-12-25"));
            $encryptedDay = Crypt::encryptString($christmasDay);

            $this->yearRepository->updateOrCreate(
                ['year' => $year],
                ['day' => $encryptedDay]
            );
        }
    }

    public function getAllYears()
    {
        return $this->yearRepository->all()->map(function ($row) {
            return [
                'year' => $row->year,
                'day' => Crypt::decryptString($row->day),
            ];
        });
    }
}