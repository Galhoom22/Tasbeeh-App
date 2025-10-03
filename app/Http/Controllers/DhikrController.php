<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\DhikrRepositoryInterface;

class DhikrController extends Controller
{
    protected $dhikrRepo;

    public function __construct(DhikrRepositoryInterface $dhikrRepo)
    {
        $this->dhikrRepo = $dhikrRepo;
    }

    public function index()
    {
        $dhikrs = $this->dhikrRepo->all();

        return response()->json($dhikrs);
    }
}
