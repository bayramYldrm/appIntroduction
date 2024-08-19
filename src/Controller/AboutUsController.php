<?php

namespace App\Controller;

use App\Entity\AboutUs;
use App\Form\AboutUsType;
use App\Repository\AboutUsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/about/us')]
class AboutUsController extends AbstractController
{
    #[Route('/', name: 'app_about_us_index', methods: ['GET'])]
    public function index(AboutUsRepository $aboutUsRepository): Response
    {
        return $this->render('about_us/index.html.twig', [
            'aboutuses' => $aboutUsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_about_us_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aboutU = new AboutUs();
        $form = $this->createForm(AboutUsType::class, $aboutU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aboutU);
            $entityManager->flush();

            return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('about_us/new.html.twig', [
            'about_u' => $aboutU,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_about_us_show', methods: ['GET'])]
    public function show(AboutUs $aboutU): Response
    {
        return $this->render('about_us/show.html.twig', [
            'about_u' => $aboutU,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_about_us_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AboutUs $aboutU, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AboutUsType::class, $aboutU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('about_us/edit.html.twig', [
            'about_u' => $aboutU,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_about_us_delete', methods: ['POST'])]
    public function delete(Request $request, AboutUs $aboutU, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aboutU->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($aboutU);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
    }
}
