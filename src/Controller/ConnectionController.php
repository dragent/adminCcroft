<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Moderateur;
use Symfony\Component\HttpFoundation\Session\Session;

// set and get session attributes

class ConnectionController extends AbstractController
{
    /**
     * @Route("/connection", name="connection")
     */

    private function verifyConnect($login, $mdp): Bool
    {
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        $modo=$modosRepo->findByConnect($login,$mdp);
        if(count($modo)==0)
        {
            return false;
        }
        $session = new Session();
        
        $session->set('idModo', $modo[0]["idModerateur"]);
        $session->set('droit', $modo[0]["superModo"]);
        return true;
    }


    private function verifyConnected():bool
    {
        
        $session = new Session();
        if($session->get("idModo"))
            return true;
        return false;
    }


    public function index(): Response
    {
        if($this->verifyConnected())
        {
            return $this->redirectToRoute('index');
        }
        $request = Request::createFromGlobals();
        $request->getPathInfo();
        $login=$request->request->get('login');
        $connect=false;
        if(!$login=="")
        {
            $mdp=$request->request->get('pass');
            if(!$mdp=="")
            {
                $connect=$this->verifyConnect($login,$mdp);
            }
        }
        if($connect)
        {
            return $this->redirectToRoute('index');
        }
        return $this->render('connection/index.html.twig', [
            'route' =>'connection'
        ]);
    }
}
