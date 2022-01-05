<?php

namespace App\Service;

use Doctrine\DBAL\Driver\Connection;
use App\Repository\RoomRepository;

class RoomService 
{
    //private RoomRepository $roomRepository;

    /**
     * RoomService constructor.
     * @param RoomRepository $roomRepository
     */
	public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Toutes les chambres en fonction du filtre
     * @param string $type
     * @param string $value
     * 
     * @return Room[]
     */
    public function findByFilter(string $type, string $value): array {

        $rooms[] = [];

        if ($type == 'squarFeet') {
            $rooms = $this->roomRepository->findBySquarFeet($value);
        } else {
            $rooms = $this->roomRepository->findByType($type, $value);
        }

        return $rooms;
    }

    // /**
    //  * Toutes les chambres en fonction du filtre
    //  * @param Filter[] $filter
    //  * 
    //  * @return Room[]
    //  */
    // public function findByFilter($filters): array {

    //     $rooms[] = [];

    //     foreach ($filters as &$filter) {
    //         if ($filter->type == 'squarFeet') {
    //             array_push($rooms, $this->roomRepository->findBySquarFeet($filter->value));
    //         } else {
    //             array_push($rooms, $this->roomRepository->findByType($filter->type, $filter->value));
    //         }
    //     }

    //     return $rooms;
    // }
}