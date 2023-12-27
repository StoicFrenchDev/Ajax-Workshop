<?php

namespace App\Controller;

use App\Entity\Enemy;
use App\Repository\EnemyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KillListController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EnemyRepository $enemyRepository): Response
    {
        $killList = $enemyRepository->findAll();

        return $this->render('home/index.html.twig', [
            'killList' => $killList,
        ]);
    }

    #[Route('/{id}', name: 'confirmKill')]
    public function confirmKill(int $id, 
    EnemyRepository $enemyRepository, 
    EntityManagerInterface $entityManager): Response
    {
        $enemy = $enemyRepository->find($id);
        $enemy->setIsAlive(false);
        $entityManager->persist($enemy);
        $entityManager->flush();
    
        $this->addFlash('success', 'Kill confirmed');

        return $this->redirectToRoute('home');
    }
}
