<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Scalar\String_;

class UserRepository
{
    use SimpleCRUD;

    private string $model = User::class;

    public function filterByUsername(string $username): Collection
    {
        return $this->model::where('username', 'LIKE', "%{$username}%")->get();
    }

    public function getNameById(?int $userId): string
    {
        if ($userId === null) {
            return ''; // Return empty string if no user ID provided
        }

        $user = User::find($userId);

        // Return user name if found, otherwise return a default value
        return $user ? $user->name : 'Unknown User';
    }

}
