<?php

namespace App\Http\Controllers;

use App\Services\DhikrService;

class DhikrController extends Controller
{
    protected $dhikrService;

    public function __construct(DhikrService $dhikrService)
    {
        $this->dhikrService = $dhikrService;
    }

    public function index()
    {
        $dhikrs = $this->dhikrService->getAllDhikrs();

        return response()->json($dhikrs);
    }
}
