<?php

namespace App\Service;

use App\dto\out\FavoriteOUT;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\FavoriteRepository;

class FavoriteService 
{
    private FavoriteRepository $favoriteRepository;

    /**
     * FavoriteService constructor.
     * @param FavoriteRepository $favoriteRepository
     */
	public function __construct(FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * Tous les favoris d'un utilisateur
     * @param int $userId id de l'utilisateur
     * 
     * @return FavoriteOUT[]
     */
    public function findByUser(int $userId): array {

        $favoritesToSend[] = [];
        $favorites = $this->favoriteRepository->findByUser($userId);

        foreach ($favorites as $favorite) {
            $favoriteToSend = 
                new FavoriteOUT($favorite->id, $favorite->itemName, $favorite->itemUrl, $favorite->itemImage);
            array_push($favoritesToSend, $favoriteToSend);
        }

        return $favoritesToSend;
    }
}