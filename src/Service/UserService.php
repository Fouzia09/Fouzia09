<?php

namespace App\Service;

use App\dto\out\RoomOUT;
use App\dto\out\UserOUT;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\UserRepository;

class UserService 
{
    //private UserRepository $userRepository;

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
        $userToSend = "";
        foreach ($user as $u) {
            $userToSend = 
            new UserOUT(
                $u->getId(),
                $u->getName(),
                $u->getEmail(),
                $u->getSiret(),
                $u->getRoles(),
                $u->getCreatedAt(),
            );

            if (count($u->getFavorites()) > 0)
            {
                foreach ($u->getFavorites() as $favorite) {
                    $userToSend->addFavorite($favorite);
                }
            }
            if (count($u->getComments()) > 0)
            {
                foreach ($u->getComments() as $comment) {
                    $userToSend->addComment($comment);
                }
            }
            if (count($u->getRestaurants()) > 0)
            {
                foreach ($u->getRestaurants() as $restaurant) {
                    $userToSend->addRestaurant($restaurant);
                }
            }
            if (count($u->getRooms()) > 0)
            {
                foreach ($u->getRooms() as $r) {
                    $room = new RoomOUT($r->getId(), $r->getName(), $r->getDescriptif(), $r->getCountry(),
                        $r->getCity(), $r->getPrice(), $r->getImage1(), $r->getImage2(), $r->getImage3(),
                        $r->getCreatedAt(), $r->getIsKingSize(), $r->getNbBed(), $r->getSquarFeet(),
                        $r->getIsPublished(), $r->getUpdatedAt(), $r->getSlug());

                    $userToSend->addRoom($room);
                }
            }
        }
        
        return $userToSend;
    }
}