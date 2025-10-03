<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dhikr;

interface DhikrRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Dhikr;
    public function create(array $data): Dhikr;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
