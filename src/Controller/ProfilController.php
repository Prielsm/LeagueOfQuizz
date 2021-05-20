<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(GameRepository $repo): Response
    {
        if ($this->getUser()) {
            $games = $repo->findByUser($this->getUser());
            return $this->render('profil/index.html.twig', [
                'controller_name' => 'ProfilController',
                'games' => $games,
            ]);
        }
        return $this->redirectToRoute('security_login');
    }
}
