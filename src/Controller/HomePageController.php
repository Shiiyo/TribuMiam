<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    #[Route('/overview', name: 'overview')]
    public function overview(): Response
    {
        return $this->render('home_page/overview.html.twig');
    }

    #[Route('/', name: 'dashboard')]
    public function dashboard(): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')){
            $user = $this->getUser();
            return $this->render('home_page/dashboard.html.twig', [
                'user' => $user,
            ]);
        }else{
            return $this->redirectToRoute('overview');
        }

    }
}
