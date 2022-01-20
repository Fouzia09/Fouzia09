<?php

namespace App\Service;

use App\dto\out\UserOUT;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\UserRepository;

class UserService 
{
    private UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
	public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Renvoit l'utilisateur avec le pseudo passé en paramètre
     * @param string $username pseudo de l'utilisateur
     * 
     * @return UserOUT
     */
    public function findByUsername(string $username): UserOUT {
        $user = $this->userRepository->findByUsername($username);
        dump($user);
        $userToSend = 
                new UserOUT($user->getId(), $user->itemName, $user->itemUrl, $user->itemImage);
        var_dump($userToSend);
        return $userToSend;
    }
}