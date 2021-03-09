<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Modo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuppressController extends AbstractController
{

   /**
    *  @Route("/suppress", name="api_suppress")
    */
   public function suppress(Request $request)
   { 
        $modosRepo=$this->getDoctrine()->getRepository(Modo::class);
        $modosRepo->deleteById($request->request->get('id'));
        
        return $this->render('index/index.html.twig', [
            'route'=>"index",
        ]);
   }
}
