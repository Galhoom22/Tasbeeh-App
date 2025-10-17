<?php

namespace App\Http\Controllers;

use App\Services\DhikrService;
use App\Http\Requests\StoreDhikrRequest;

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
        return view('dhikrs.index', compact('dhikrs'));
    }

    public function store(StoreDhikrRequest $request)
    {
        $this->dhikrService->createDhikr($request->validated());

        return redirect()->route('dhikrs.index')
            ->with('success', __('dhikrs.created_successfully'));
    }

    public function create()
    {
        return view('dhikrs.create');
    }

    public function edit(int $dhikr)
    {
        $dhikr = $this->dhikrService->getDhikrById($dhikr);
        return view('dhikrs.edit', compact('dhikr'));
    }

    public function update(Dhikr $dhikr, StoreDhikrRequest $request)
    {
        //
    }
}
