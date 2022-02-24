<?php

namespace App\Service;

use App\dto\out\RestaurantOUT;
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

    /**
     * Les trois récents restaurants
     * 
     * @return RestaurantOUT[]
     */
    public function findThreeLast(): array {
        $restaurantsToSend = [];
        $restaurants = $this->restaurantRepository->findThreeLast();

        foreach ($restaurants as $restaurant) {
            $restaurantToSend = new RestaurantOUT($restaurant->getId(), $restaurant->getName(), $restaurant->getDescriptif(),
                $restaurant->getCountry(), $restaurant->getCity(), $restaurant->getNamePlat(), $restaurant->getPrice(),
                $restaurant->getImage1(), $restaurant->getImage2(), $restaurant->getCreatedAt(), $restaurant->getDescriptifPlat(),
                $restaurant->getRangePrice1(), $restaurant->getRangePrice2(), $restaurant->getAddress(),
                $restaurant->getZipcode(), $restaurant->getIsPublished(), $restaurant->getUpdatedAt(), $restaurant->getSlug());

            array_push($restaurantsToSend, $restaurantToSend);
        }

        return $restaurantsToSend;
    }

}
