<?php

namespace App\Controller;

use App\Repository\FavoriteRepository;
use App\Service\FavoriteService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/favorites")
 */
class FavoriteController extends AbstractController
{
    //private FavoriteService $favoriteService;

    /**
     * FavoriteController constructor.
     * @param FavoriteService $favoriteService
     */
	public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    /**
     * @Route("/byItemUrl/{itemUrl}", name="findFavorite")
     * @param string $itemUrl
     * 
     * @return Response
     */
	public function findByUser(string $itemUrl): Response
	{
        $test = "/room/detail/".$itemUrl;
        $favorite = $this->favoriteService->findByItemUrl($itemUrl);

		if ($favorite != null) {
			return $this->json($favorite, Response::HTTP_OK, [], ['groups' => ['favorite:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}
}
