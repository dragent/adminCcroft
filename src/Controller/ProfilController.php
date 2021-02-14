<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Moderateur;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    private function verifyConnected($id):bool
    {
        if($id != null)
            return true;
        return false;
    }

    private function modifProfil($mail,$mdp, $id)
    {
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        if($this->verifyEmail($mail))
        {
            if((!$mdp=="") && (!$mail==""))
            {
                $modosRepo->modifyByProfil($mail,$mdp,$id);
                return $this->redirectToRoute('profil');
            }
            else if(($mdp=="") && (!$mail==""))
            {

                $modosRepo->modifMail($mail,$id);
                return $this->redirectToRoute('profil');
            }
        }
        else if ((!$mdp=="") && ($mail==""))
        {
            $modosRepo->modifPassword($mdp,$id);
            return $this->redirectToRoute('profil');
        }
        return $this->render('profil/edit.html.twig', [
            'profil'=>$modosRepo->findById($id),
            'route'=>"profil",
        ]);;
    }


    private function verifyEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function index(): Response
    {
        $session = new Session();
        $id=$session->get("idModo");
        if(!$this->verifyConnected($session))
        {
            return $this->redirectToRoute('index');
        }
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        return $this->render('profil/index.html.twig', [
            'profil'=>$modosRepo->findById($id),
            'route'=>"profil",
        ]);
    }

    public function edit():Response
    { 
        $session = new Session();
        $id=$session->get("idModo");
        if(!$this->verifyConnected($id))
        {
            return $this->redirectToRoute('index');
        }
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        $request = Request::createFromGlobals();
        $modfiSend=$request->request->get('modifSend');
        if(! is_null($modfiSend))
        {
            $mail=$request->request->get('email');
            $mdp=$request->request->get('mdp');
            return $this->modifProfil($mail,$mdp,$id);
        }
        return $this->render('profil/edit.html.twig', [
            'profil'=>$modosRepo->findById($id),
            'route'=>"profil",
        ]);
    }
}
