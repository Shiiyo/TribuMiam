<?php

namespace App\Controller;

use App\Entity\Tribe;
use App\Form\TribeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TribeController extends AbstractController
{
    #[Route('/new-tribe', name: 'new-tribe')]
    public function newTribe(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tribe = new Tribe();
        $form = $this->createForm(TribeType::class, $tribe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $tribe->setName($form->get('name')->getData());
            $tribe->setDescription($form->get('description')->getData());
            
            $entityManager->persist($tribe);
            $entityManager->flush();
            
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('tribe/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
