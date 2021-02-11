<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vip;
use Symfony\Component\HttpFoundation\Session\Session;

class VipsController extends AbstractController
{
    /**
     * @Route("/vips", name="vips")
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
        $VipRepo=$this->getDoctrine()->getRepository(Vip::class);
        return $this->render('vips/index.html.twig', [
            'vips' => $VipRepo->findAll(),
            'route' =>'vips',
        ]);
    }
}
