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
    private FavoriteService $favoriteService;

    /**
     * FavoriteController constructor.
     * @param FavoriteService $favoriteService
     */
	public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    /**
     * @Route("/{userId}", name="findFavorites")
     * @param int $userId
     * 
     * @return Response
     */
	public function findByUser(int $userId): Response
	{
        $favorites = $this->favoriteService->findByUser($userId);

		if (sizeof($favorites) > 0) {
			return $this->json($favorites, Response::HTTP_OK, [], ['groups' => ['favorite:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}
}
