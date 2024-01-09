<?php

namespace App\Controller;

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
        try {
            $enemy = $enemyRepository->find($id);
        
            if ($enemy === null) {
                return new Response(status: Response::HTTP_NOT_FOUND);
            }
        
            $enemy->setIsAlive(false);
            $entityManager->persist($enemy);
            $entityManager->flush();
        
            return new Response(status: Response::HTTP_OK);
        }
        catch (\Exception $e) {
            // Log the exception, if logging is set up
            // error_log($e->getMessage());
            return new Response(status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
