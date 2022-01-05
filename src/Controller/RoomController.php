<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use App\Service\RoomService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/rooms")
 */
class RoomController extends AbstractController
{
    //private RoomService $roomService;

    /**
     * RoomController constructor.
     * @param RoomService $roomService
     */
	public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
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
        $rooms = $this->roomService->findByFilter($type, $value);

		if (sizeof($rooms) > 0) {
			return $this->json($rooms, Response::HTTP_OK, [], ['groups' => ['room:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}

    // /**
    //  * @Route("/filter", name="filter")
    //  * @param string $value
    //  * 
    //  * @return Response
    //  */
	// public function filter(Request $request, SerializerInterface $serializer): Response
	// {
    //     $filters = $serializer->deserialize($request->get('filters'), Filter::class[], 'json');
    //     $rooms = $this->roomService->findByFilter($filters);

	// 	if (sizeof($rooms) > 0) {
	// 		return $this->json($rooms, 200, [], ['groups' => ['room:read']]);
	// 	} else {
	// 		return $this->json(['status' => Response::HTTP_OK, 'message' => 'Aucune donnée trouvée'], 200);
	// 	}
	// }
}
