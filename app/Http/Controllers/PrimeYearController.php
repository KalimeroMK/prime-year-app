<?php

namespace App\Http\Controllers;

use App\Services\PrimeYearService;
use Illuminate\Http\Request;

class PrimeYearController extends Controller
{
    protected PrimeYearService $primeYearService;

    public function __construct(PrimeYearService $primeYearService)
    {
        $this->primeYearService = $primeYearService;
    }

    public function showForm()
    {
        return view('form');
    }

    public function submitYear(Request $request)
    {
        $year = $request->input('year');
        $this->primeYearService->processYear($year);

        return response()->json(['message' => 'Data processed successfully']);
    }

    public function fetchData()
    {
        $data = $this->primeYearService->getAllYears();
        return response()->json($data);
    }
}