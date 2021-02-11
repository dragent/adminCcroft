<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Moderateur;
use Symfony\Component\HttpFoundation\Session\Session;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function bloquer(): Response
    {
        return $this->redirectToRoute('index');
    }

    private function verifyConnected($session):bool
    {
        if($session->get("idModo"))
            return true;
        return false;
    }

    public function add() : Response
    {
        $session = new Session();
        if($this->verifyConnected($session))
        {
            return $this->redirectToRoute('index');
        }
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        $request = Request::createFromGlobals();
        $path=explode('/',$request->server->get("PATH_INFO"))[2];
        $modo=$modosRepo->findBylink($path);
        if((count($modo)==0)||($modo[0]->getLinkIsUsed()))
            return $this->redirectToRoute('index');
        $mail=$request->request->get("email");
        $mdp=$request->request->get("mdp");
        if((!$mail==null) && (!$mdp==null))
        {
            $modosRepo->modifyByAdd($mail,$mdp,$modo[0]->getIdModerateur());
            $session->set('idModo', $modo[0]->getIdModerateur());
            $session->set('droit', $modo[0]->getSuperModo());
            return $this->redirectToRoute('index');
        }
        return $this->render('inscription/add.html.twig', [
            'route' =>'inscription'
        ]);

    }

}
