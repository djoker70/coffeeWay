<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
;
class CoffeeHouseController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('coffee_house/index.html.twig', [
            'controller_name' => 'CoffeeHouseController',
        ]);
    }

    #[Route('/api/coffeeHouse', name: 'coffee_house')]
    public function coffeeHouse(): Response
    {
        return $this->render('coffee_house/index.html.twig', [
            'controller_name' => 'CoffeeHouseController',
        ]);
    }
}
