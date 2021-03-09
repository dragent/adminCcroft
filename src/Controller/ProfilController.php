<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{

    private function modifyProfil(Request $request,EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
            $mail=$request->request->get('email');
            $mdp=$request->request->get('mdp');
            $adress=$request->request->get('adress');
            $city=$request->request->get("city");
            if(($mail=="") && ($mdp=='') && ($adress="") && ($city==""))
            {
                return $this->render('profil/edit.html.twig', [
                    'profil'=>$this->getUser(),
                    'route'=>"profil",
                ]);
            }
            if($mail!="")
            {
                $this->getUser()->setEmail($mail);
            }
            if($mdp!="") 
            {
                $this->getUser()->setPassword($encoder->encodePassword( $this->getUser(), $mdp ));
            }
            if($adress!="")
            {
                $this->getUser()->setAdress($adress);
            }
            if(!$city!='')
            {
                $this->getUser()->setCity($city);
            }
            $manager->persist($this->getUser());
            $manager->flush();
            return $this->render('profil/edit.html.twig', [
                'profil'=>$this->getUser(),
                'route'=>"profil",
            ]);
    }
    /**
     * @Route("/profil", name="profil")
     */
    public function perso(): Response
    {  
        if($this->getUser()==null)
            return $this->redirectToRoute('index');
        return $this->render('profil/profil.html.twig', [
            'profil'=>$this->getUser(),
            'route'=>"profil",
        ]);
    }

    public function edit(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {
        if($this->getUser()==null)
            return $this->redirectToRoute('index');
        $modfiSend=$request->request->get('modifSend');
        if(! is_null($modfiSend))
        {
            return $this->modifyProfil($request,$manager,$encoder);
        }
        return $this->render('profil/edit.html.twig', [
            'profil'=>$this->getUser(),
            'route'=>"profil",
        ]);
    }
}
