<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]

    public function index(MailerInterface $mailer): Response
    {
        return $this->render('homepage.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
