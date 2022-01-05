<?php

namespace App\Service;

use Doctrine\DBAL\Driver\Connection;
use App\Repository\RestaurantRepository;

class RestaurantService 
{
    //private RestaurantRepository $RestaurantRepository;

    /**
     * RestaurantService constructor.
     * @param RestaurantRepository $restaurantRepository
     */
    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * Tout les restaurants en fonction du filtre
     * @param string $type
     * @param string $value
     * 
     * @return Restaurant[]
     */
    public function findByFilter(string $type, string $value): array {

        $restaurants[] = [];

        {
            $restaurants = $this->restaurantRepository->findByType($type, $value);
        }

        return $restaurants;
    }

        /**
     * Tout les restaurants en fonction du filtre
     * @param string $type
     * @param string $value
     * 
     * @return Restaurant[]
     */
    public function findByFilterPrice( string $value): array {

        $restaurants[] = [];

        {
            $restaurants = $this->restaurantRepository->findByRangePrice($value);
        }

        return $restaurants;
    }

}
