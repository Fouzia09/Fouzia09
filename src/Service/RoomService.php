<?php

namespace App\Service;

use App\dto\out\RoomOUT;
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

        /**
     * Toutes les chambres en fonction du filtre
     * @param string $type
     * @param string $value
     * 
     * @return Room[]
     */
    public function findByValue(string $value): array {

        $rooms[] = [];
            $rooms = $this->roomRepository->findByValue($value);
        return $rooms;
    }

    /**
     * Les trois récentes chambres
     * 
     * @return RoomOUT[]
     */
    public function findThreeLast(): array {
        $roomsToSend = [];
        $rooms = $this->roomRepository->findThreeLast();

        foreach ($rooms as $room) {
            $roomToSend = new RoomOUT($room->getId(), $room->getName(), $room->getDescriptif(), $room->getCountry(),
                    $room->getCity(), $room->getPrice(), $room->getImage1(), $room->getImage2(), $room->getImage3(),
                    $room->getCreatedAt(), $room->getIsKingSize(), $room->getNbBed(), $room->getSquarFeet(), $room->getAddress(),
                    $room->getZipcode(), $room->getIsPublished(), $room->getUpdatedAt(), $room->getSlug());

            array_push($roomsToSend, $roomToSend);
        }

        return $roomsToSend;
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