<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vips;

class VipsController extends AbstractController
{
    /**
     * @Route("/vips", name="vips")
     */
    public function list(): Response
    {
        if($this->getUser()==null)
            return $this->redirectToRoute('list');
        $VipRepo=$this->getDoctrine()->getRepository(Vips::class);
        return $this->render('vips/list.html.twig', [
        'vips' => $VipRepo->findAll(),
        'route' =>'vips',
        ]);
    }
}
