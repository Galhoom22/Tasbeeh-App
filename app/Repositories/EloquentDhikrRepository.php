<?php

namespace App\Repositories;

use App\Models\Dhikr;
use App\Repositories\Contracts\DhikrRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentDhikrRepository implements DhikrRepositoryInterface
{
    public function all(): Collection
    {
        return Dhikr::all();
    }
    public function find(int $id): ?Dhikr
    {
        return Dhikr::find($id);
    }
    public function create(array $data): Dhikr
    {
        return Dhikr::create($data);
    }
    public function update(int $id, array $data): ?Dhikr
    {
        $dhikr = $this->find($id);

        if (!$dhikr) {
            return null;
        }

        $dhikr->update($data);
        return $dhikr->fresh(); // Reload from DB
    }
    public function delete(int $id): bool
    {
        $dhikr = $this->find($id);

        if (!$dhikr) {
            return false;
        }

        return $dhikr->delete();
    }
}
