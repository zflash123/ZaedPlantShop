<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{
    public function getUser(){
        $userId = Auth::id();
        return User::where('id', $userId)->get();;
    }
}
?>
