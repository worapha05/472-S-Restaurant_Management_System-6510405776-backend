<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    use SimpleCRUD;

    private string $model = User::class;

    public function filterByUsername(string $username): Collection
    {
        return $this->model::where('username', 'LIKE', "%{$username}%")->get();
    }

}
