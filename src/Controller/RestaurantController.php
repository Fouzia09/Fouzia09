<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use App\Service\RestaurantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/restaurants")
 */
class RestaurantController extends AbstractController
{
    private RestaurantService $restaurantService;

    /**
     * RestaurantController constructor.
     * @param RestaurantService $restaurantService
     */
	public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    /**
     * @Route("/filter/{type}/{value}", name="filter")
     * @param string $type
     * @param string $value
     * 
     * @return Response
     */
	public function filter(string $type, string $value): Response
	{
        $restaurants = $this->restaurantService->findByFilter($type, $value);

		if (sizeof($restaurants) > 0) {
			return $this->json($restaurants, 200, [], ['groups' => ['restaurant:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_OK, 'message' => 'No data found'], 200);
		}
	}

}
