<?php

namespace App\Controller;

use App\Repository\EnemyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EnemyRepository $enemyRepository): Response
    {
        $killList = $enemyRepository->findAll();
        return $this->render('home/index.html.twig', [
            'killList' => $killList,
        ]);
    }
}
