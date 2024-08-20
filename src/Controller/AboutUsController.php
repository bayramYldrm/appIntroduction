<?php

// src/Controller/AboutUsController.php

namespace App\Controller;

use App\Entity\AboutUs;
use App\Form\AboutUsType;
use App\Repository\AboutUsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/about/us')]
class AboutUsController extends AbstractController
{
    #[Route('/index', name: 'app_about_us_index', methods: ['GET'])]
    public function index(AboutUsRepository $aboutUsRepository): Response
    {
        return $this->render('about_us/index.html.twig', [
            'aboutuses' => $aboutUsRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_about_us_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aboutUs = new AboutUs();
        $form = $this->createForm(AboutUsType::class, $aboutUs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle logo file upload
            $logoFile = $form->get('logo')->getData();
            if ($logoFile) {
                $originalFilename = pathinfo($logoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid() . '.' . $logoFile->guessExtension();
                try {
                    $logoFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                    $aboutUs->setLogo($newFilename);
                } catch (FileException $e) {
                    // Handle exception
                }
            }

            // Handle adImage1
            $adImage1 = $form->get('adImage1')->getData();
            if ($adImage1) {
                $originalFilename = pathinfo($adImage1->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid() . '.' . $adImage1->guessExtension();
                try {
                    $adImage1->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                    $aboutUs->setAdImage1($newFilename);
                } catch (FileException $e) {
                    // Handle exception
                }
            }

            // Handle adImage2
            $adImage2 = $form->get('adImage2')->getData();
            if ($adImage2) {
                $originalFilename = pathinfo($adImage2->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid() . '.' . $adImage2->guessExtension();
                try {
                    $adImage2->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                    $aboutUs->setAdImage2($newFilename);
                } catch (FileException $e) {
                    // Handle exception
                }
            }

            // Handle adImage3
            $adImage3 = $form->get('adImage3')->getData();
            if ($adImage3) {
                $originalFilename = pathinfo($adImage3->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid() . '.' . $adImage3->guessExtension();
                try {
                    $adImage3->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                    $aboutUs->setAdImage3($newFilename);
                } catch (FileException $e) {
                    // Handle exception
                }
            }

            $entityManager->persist($aboutUs);
            $entityManager->flush();

            return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('about_us/new.html.twig', [
            'about_u' => $aboutUs,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_about_us_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AboutUs $aboutUs, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AboutUsType::class, $aboutUs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle logo file upload
            $logoFile = $form->get('logo')->getData();
            if ($logoFile) {
                $originalFilename = pathinfo($logoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid() . '.' . $logoFile->guessExtension();
                try {
                    $logoFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception
                }
                $aboutUs->setLogo($newFilename);
            }

            // Handle additional files similarly

            $entityManager->flush();

            return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('about_us/edit.html.twig', [
            'about_u' => $aboutUs,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/{id}', name: 'app_about_us_show', methods: ['GET'])]
    public function show(AboutUs $aboutUs): Response
    {
        return $this->render('about_us/show.html.twig', [
            'about_u' => $aboutUs,
        ]);
    }
    #[Route('/{id}', name: 'app_about_us_delete', methods: ['POST'])]
    public function delete(Request $request, AboutUs $aboutUs, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $aboutUs->getId(), $request->request->get('_token'))) {
            $entityManager->remove($aboutUs);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_about_us_index', [], Response::HTTP_SEE_OTHER);
    }
}
