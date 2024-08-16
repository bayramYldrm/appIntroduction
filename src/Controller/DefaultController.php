<?php

namespace App\Controller;

use App\Repository\AppRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(HomeRepository $homeRepository, AppRepository $appRepository): Response
    {
        $homes = $homeRepository->findAllHomes();
        $apps = $appRepository->findAll();

        return $this->render('default/index.html.twig', [
            'homes' => $homes,
            'apps' => $apps,
        ]);
    }

    #[Route('/app/{id}', name: 'app_app_show', methods: ['GET'])]
    public function showAppDetails(int $id, AppRepository $appRepository): Response
    {
        $app = $appRepository->find($id);

        if (!$app) {
            throw $this->createNotFoundException('The app does not exist');
        }

        return $this->render('default/show_app_details.html.twig', [
            'app' => $app,
        ]);
    }
}
