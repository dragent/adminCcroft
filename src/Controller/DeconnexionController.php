<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DeconnexionController extends AbstractController
{
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    private function verifyConnected():bool
    {
        
        $session = new Session();
        if($session->get("idModo"))
            return true;
        return false;
    }

    public function index(): Response
    {
        if(!$this->verifyConnected())
        {
            return $this->redirectToRoute('index');
        }
        $session = new Session();
        $session->clear();
        return $this->redirectToRoute('index');
    }
}
