<?php

namespace App\Controller;

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
        $coffeeHouses = $this->coffeeHouseService->getAllCoffeeHouses();
        return $this->json($coffeeHouses);
    }
}
