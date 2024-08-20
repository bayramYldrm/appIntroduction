<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Form\ContactUsType;
use App\Repository\AboutUsRepository;
use App\Repository\AppRepository;
use App\Repository\HomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/contact', name: 'app_contact_us_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, AboutUsRepository $aboutUs): Response
    {
        $aboutUs = $aboutUs->findAll();
        $contactU = new ContactUs();
        $form = $this->createForm(ContactUsType::class, $contactU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactU);
            $entityManager->flush();

            return $this->redirectToRoute('app_default', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('default/contact_us.html.twig', [
            'contact_u' => $contactU,
            'form' => $form,
            'aboutuses' => $aboutUs,
        ]);
    }
}
