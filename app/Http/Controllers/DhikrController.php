<?php

namespace App\Http\Controllers;

use App\Services\DhikrService;
use App\Http\Requests\StoreDhikrRequest;
use App\Http\Requests\UpdateDhikrRequest;

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
        if (request()->is('api/*')) {
            return response()->json($dhikrs);
        }
        return view('dhikrs.index', compact('dhikrs'));
    }

    public function show(int $dhikr)
    {
        $dhikr = $this->dhikrService->getDhikrById($dhikr);
        if (request()->is('api/*')) {
            return response()->json($dhikr);
        }
        return view('dhikrs.show', compact('dhikr'));
    }

    public function create()
    {
        return view('dhikrs.create');
    }
    public function store(StoreDhikrRequest $request)
    {
        $dhikr = $this->dhikrService->createDhikr($request->validated());

        if (request()->is('api/*')) {
            return response()->json($dhikr, 201);
        }

        return redirect()->route('dhikrs.index')
            ->with('success', __('dhikrs.created_successfully'));
    }

    public function edit(int $dhikr)
    {
        $dhikr = $this->dhikrService->getDhikrById($dhikr);
        return view('dhikrs.edit', compact('dhikr'));
    }

    public function update(int $dhikr, UpdateDhikrRequest $request)
    {
        $updated = $this->dhikrService->updateDhikr($dhikr, $request->validated());

        if (request()->is('api/*')) {
            return response()->json($updated);
        }

        return redirect()->route('dhikrs.index')
            ->with('success', __('dhikrs.updated_successfully'));
    }

    public function destroy(int $dhikr)
    {
        $this->dhikrService->deleteDhikr($dhikr);
        if (request()->is('api/*')) {
            return response()->json(['message' => __('dhikrs.deleted_successfully')], 204);
        }
        return redirect()->route('dhikrs.index')->with('success', __('dhikrs.deleted_successfully'));
    }
}
