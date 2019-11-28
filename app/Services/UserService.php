<?php


namespace App\Services;

use App\Repositories\UserRepositoryEloquent as UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function attemptLogin($account, $password)
    {
        $status = false;
        $user = $this->userRepository
            ->findWhere([
                'account' => $account,
            ])
            ->first();
        if (!is_null($user) && Hash::check($password, $user->password)) {
            Auth::login($user);
            $status = true;
        }
        return $status;
    }


}
