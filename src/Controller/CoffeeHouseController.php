<?php

namespace App\Controller;

use App\DBAL\Types\Geolocation\Point;
use App\Service\CoffeeHouseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoffeeHouseController extends AbstractController
{
    public function __construct(private CoffeeHouseService $coffeeHouseService)
    {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('coffee_house/index.html.twig', [
            'controller_name' => 'CoffeeHouseController',
        ]);
    }

    #[Route(path: '/api/coffeeHouse', name: 'coffee_house', methods: ['GET'])]
    public function coffeeHouse(): Response
    {
        $coffeeHousesList = $this->coffeeHouseService->getAllCoffeeHousesList();
        return $this->json($coffeeHousesList);
    }

    #[Route(path: '/api/coffeeHouse/inRadius', name: 'coffee_house_in_radius', methods: ['GET'])]
    public function coffeeHouseInRadius(): Response
    {
        $latitude = '55.760038';
        $longitude = '37.617799';
        $point = new Point($latitude, $longitude);
        $coffeeHousesList = $this->coffeeHouseService->getCoffeeHousesInRadiusPointList($point);
        return $this->json($coffeeHousesList);
    }
}
