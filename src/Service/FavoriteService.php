<?php

namespace App\Service;

use App\dto\out\FavoriteOUTFromUserOUT;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\FavoriteRepository;

class FavoriteService 
{
    //private FavoriteRepository $favoriteRepository;

    /**
     * FavoriteService constructor.
     * @param FavoriteRepository $favoriteRepository
     */
	public function __construct(FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * Le favoris possedant l'url de l'item passée en paramètre
     * Donc l'item en favoris
     * @param string $itemUrl l'url de l'item
     * 
     * @return FavoriteOUTFromUserOUT[]
     */
    public function findByItemUrl(string $itemUrl): array {

        $favoritesToSend[] = [];
        $favorites = $this->favoriteRepository->findByItemUrl($itemUrl);
        dump($favorites);

        foreach ($favorites as $favorite) {
            $favoriteToSend = 
                new FavoriteOUTFromUserOUT($favorite->id, $favorite->itemName, $favorite->itemUrl, $favorite->itemImage);
            array_push($favoritesToSend, $favoriteToSend);
        }

        return $favoritesToSend;
    }
}