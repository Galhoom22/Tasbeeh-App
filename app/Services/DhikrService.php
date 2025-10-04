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
}
