<?php

namespace App\Controller;

use App\Repository\AboutUsRepository;
use App\Repository\AppRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(HomeRepository $homeRepository, AppRepository $appRepository, AboutUsRepository $aboutUs): Response
    {
        $homes = $homeRepository->findAllHomes();
        $apps = $appRepository->findAll();
        $aboutUs = $aboutUs->findAll();
        return $this->render('default/index.html.twig', [
            'homes' => $homes,
            'apps' => $apps,
            'aboutuses' => $aboutUs,
        ]);
    }

    #[Route('/app/{id}', name: 'app_app_show', methods: ['GET'])]
    public function showAppDetails(int $id, AppRepository $appRepository, AboutUsRepository $aboutUs): Response
    {
        $aboutUs = $aboutUs->findAll();
        $app = $appRepository->find($id);

        if (!$app) {
            throw $this->createNotFoundException('The app does not exist');
        }

        return $this->render('default/show_app_details.html.twig', [
            'app' => $app,
            'aboutuses' => $aboutUs,
        ]);
    }

    #[Route('/about', name: 'app_about_us_home', methods: ['GET'])]
    public function about(AboutUsRepository $aboutUsRepository): Response
    {
        return $this->render('default/about_Us.html.twig', [
            'aboutuses' => $aboutUsRepository->findAll(),
        ]);
    }
}
