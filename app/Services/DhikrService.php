<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\DhikrRepositoryInterface;

class DhikrService
{
    protected $dhikrRepo;

    public function __construct(DhikrRepositoryInterface $dhikrRepo)
    {
        $this->dhikrRepo = $dhikrRepo;
    }

    public function getAllDhikrs()
    {
        return $this->dhikrRepo->all();
    }

    public function createDhikr(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->dhikrRepo->create($data);
        });
    }

    public function getDhikrById(int $id)
    {
        return $this->dhikrRepo->find($id);
    }

    public function updateDhikr(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            return $this->dhikrRepo->update($id, $data);
        });
    }

    public function deleteDhikr(int $id)
    {
        return DB::transaction(function () use ($id) {
            return $this->dhikrRepo->delete($id);
        });
    }
}
