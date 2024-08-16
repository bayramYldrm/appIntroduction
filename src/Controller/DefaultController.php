<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(HomeRepository $homeRepository): Response
    {
        $homes = $homeRepository->findAllHomes();

        return $this->render('default/index.html.twig', [
            'homes' => $homes,
        ]);
    }
}
