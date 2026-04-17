<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    public function generateUsername(string $policeId): string
    {
        $baseUsername = 'user_' . $policeId;
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . '_' . $counter;
            $counter++;
        }

        return $username;
    }
}
