<?php

namespace App\Controller;

use App\Entity\App;
use App\Form\AppType;
use App\Repository\AppRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/app')]
class AppController extends AbstractController
{
    #[Route('/', name: 'app_app_index', methods: ['GET'])]
    public function index(AppRepository $appRepository): Response
    {
        $apps = $appRepository->findAll();

        return $this->render('app/index.html.twig', [
            'apps' => $apps,
        ]);
    }

    #[Route('/new', name: 'app_app_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $app = new App();
        $form = $this->createForm(AppType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle file upload exception if needed
                }

                $app->setImage($newFilename);
            }

            $entityManager->persist($app);
            $entityManager->flush();

            return $this->redirectToRoute('app_app_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/new.html.twig', [
            'app' => $app,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_app_show', methods: ['GET'])]
    public function show(App $app): Response
    {
        return $this->render('app/show.html.twig', [
            'app' => $app,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_app_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, App $app, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AppType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle file upload exception if needed
                }

                $app->setImage($newFilename);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_app_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/edit.html.twig', [
            'app' => $app,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_app_delete', methods: ['POST'])]
    public function delete(Request $request, App $app, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$app->getId(), $request->request->get('_token'))) {
            $entityManager->remove($app);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_app_index', [], Response::HTTP_SEE_OTHER);
    }
}
