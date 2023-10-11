<?php

namespace App\Application\Services;

use App\Models\User;
use App\Domain\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserService implements UserRepository
{
    public function __construct()
    {
        $this->populateDatabaseIfNeeded();
    }

    private function populateDatabaseIfNeeded()
    {
        if (User::count() == 0) {
            $this->fetchAllFromAPIAndSave();
        }
    }

    private function fetchAllFromAPIAndSave()
    {
        $response = Http::get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
        if ($response->successful()) {
            $data = $response->json();
            $usersArray = $data['users'] ?? [];
            DB::beginTransaction();
            try {
                foreach ($usersArray as $user) {
                    User::create([
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'age' => $user['age']
                    ]);
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error("An error occurred while saving users: {$e->getMessage()}");
            }
        }
    }

    public function all(): LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function find(int $id)
    {
        return User::find($id);
    }

    public function update(int $id, array $data): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}