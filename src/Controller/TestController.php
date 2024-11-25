<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/Listtest', name: 'Listtest')]
    public function Listtest(TestRepository $repo): Response
    {
        $test = $repo->findAll(); // Fetch data from the repository
        return $this->render('test/List2.html.twig', [
            'test' => $test, // Key name must match the template variable
        ]);
    }
}
