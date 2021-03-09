<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Modo;
use App\Form\RegisterModoType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {
        if($this->getUser()!=null)
        {
            return $this->redirectToRoute('index');
        }
        $modoRepo= $this->getDoctrine()->getRepository(Modo::class);
        $link=explode('/',$request->server->get("SCRIPT_URL"))[2];
        $modo=$modoRepo->findBy(['link'=>$link])[0];
        if(($modo==null) || ( $modo->getLinkIsUsed() ))
        {
            return $this->redirectToRoute('login');
        }
        $form = $this->createForm(RegisterModoType::class,$modo);
        $form->handleRequest($request);
        if(($form->isSubmitted()) && ($form->isValid() ))
        {
            $modo->setPassword($encoder->encodePassword($modo,$modo->getPassword()));
            $modo->setLinkIsUsed(true);
            $manager->persist($modo);
            $manager->flush();
            return $this->redirectToRoute('login');
        }
        return $this->render('security/register.html.twig', [
            'controller_name' => 'SecurityController',
            'form'=>$form->createView(),
            'pseudo'=>$modo->getPseudo(),
            'route'=>'inscription',
        ]);
    }

    public function login()
    {
        return $this->render('security/login.html.twig', [
            'controller_name' => 'SecurityController',
            'route'=> 'login',
        ]);
    }

    public function logout()
    {

    }
}
