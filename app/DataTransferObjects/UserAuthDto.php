<?php

namespace App\DataTransferObjects;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;

class UserAuthDto
{
    public function __construct(
        public string $police_id,
        public string $name,
        public string $password,
        public string $role,
    )
    {
        //
    }
    public static function fromRequest(UserRegisterRequest $request): self
    {
        return new self(
            police_id: $request->validated('police_id'),
            name: $request->validated('name'),
            password: Hash::make($request->validated('password')),
            role: $request->validated('role'),
        );
    }
    public function toArray(): array
    {
        return [
            'name'     => $this->name,
            'police_id' => $this->police_id,
            'password' => $this->password,
            'role'     => $this->role,
        ];
    }
}
