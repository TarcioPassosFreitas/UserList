<?php

namespace App\Domain;

use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepository
{
    public function all(): LengthAwarePaginator;
    public function find(int $id);
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}

?>