<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Error404Controller extends AbstractController
{
    /**
     * @Route("/error404", name="error404")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('index');
    }

    public function connexion(): Response
    {
        return $this->redirectToRoute('connection');
    }

    public function profil(): Response
    {
        return $this->redirectToRoute('profil');
    }

    public function moderateur(): Response
    {
        return $this->redirectToRoute('modos');
    }

    public function vips(): Response
    {
        return $this->redirectToRoute('vips');
    }

    public function deco(): Response
    {
        return $this->redirectToRoute('deconnexion');
    }
}
