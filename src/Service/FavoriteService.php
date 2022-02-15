<?php

namespace App\Service;

use App\dto\out\FavoriteOUT;
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
     * @return FavoriteOUT
     */
    public function findByItemUrl(string $itemUrl) {
        $favorite = $this->favoriteRepository->findByItemUrl($itemUrl);

        if ($favorite == null) { return null; }

        $favoriteToSend = new FavoriteOUT(
            $favorite->getId(), $favorite->getItemName(), $favorite->getItemUrl(), $favorite->getItemImage()
        );
        
        foreach ($favorite->getUsers() as $user) {
            $favoriteToSend->addUser($user->getId());
        }
        
        return $favoriteToSend;
    }
}