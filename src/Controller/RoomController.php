<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use App\Service\RoomService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/", name="question_index", methods={"GET"})
     */
    public function getAll(RoomRepository $roomRepository): Response
    {
        $rooms = $roomRepository->findAll();
        if(sizeof($rooms) == 0){
            return $this-> json(['status'=> Response::HTTP_NOT_FOUND, 'message'=> 'No question found '] , 404, []);
        }
        return  $this->json($rooms, 200, [], ['groups'=>["groups","room:read"]]);
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

    /**
     * @Route("/filter/{value}", name="filter")
     * @param string $value
     * 
     * @return Response
     */
	public function filterValue(string $value): Response
	{
        $rooms = $this->roomService->findByValue($value);

		if (sizeof($rooms) > 0) {
			return $this->json($rooms, Response::HTTP_OK, [], ['groups' => ['room:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}

    /**
     * @Route("/threeLast", name="threeLastRooms")
     * 
     * @return Response
     */
    public function findThreeLast(): Response
    {
        $rooms = $this->roomService->findThreeLast();

        if (sizeof($rooms) > 0) {
            return $this->json($rooms, 200, [], ['groups' => ['room:read']]);
        } else {
            return $this->json(['status' => Response::HTTP_OK, 'message' => 'No data found']);
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
