<?php

namespace App\Services;

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
        return $this->dhikrRepo->create($data);
    }

    public function getDhikrById(int $id)
    {
        return $this->dhikrRepo->find($id);
    }

    public function updateDhikr(int $id, array $data)
    {
        return $this->dhikrRepo->update($id, $data);
    }
}
