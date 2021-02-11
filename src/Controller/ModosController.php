<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Moderateur;
use Symfony\Component\HttpFoundation\Session\Session;

class ModosController extends AbstractController
{
    /**
     * @Route("/modos", name="modos")
     */
    private function verifyConnected( $session):bool
    {
        if($session->get("idModo"))
            return true;
        return false;
    }

    private  function generateRandomString() {
        $length = random_int(5,15);
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function createModo($login,$rang,$link)
    {
        $manager=$this->getDoctrine()->getManager();
        $modo = new Moderateur();
        $modo->setPseudoModerateur($login);
        $modo->setSuperModo($rang);
        $modo->setLien($link);
        $modo->setLinkIsUsed(false);
        $manager->persist($modo);
        $manager->flush();
    }

    private function createLink() : String
    {
        $link=$this->generateRandomString();
        return $link;
    }

    public function index(): Response
    {
        $session = new Session();
        if(!$this->verifyConnected( $session))
        {
            return $this->redirectToRoute('index');
        }
        $link= $session->get("link");
        $add= $session->get("addModo");
        $session->remove("link");
        $session->remove("addModo");
        $modosRepo=$this->getDoctrine()->getRepository(Moderateur::class);
        return $this->render('modos/index.html.twig', [
            'modos' => $modosRepo->findAll(),
            'droit' => $session->get("droit"),
            'add' => $add,
            'link' => $link,
            'route' =>'modos'
        ]);
    }

    public function add(): Response
    {
        $session = new Session();
        $request = Request::createFromGlobals();
        if(!$this->verifyConnected($session))
        {
            return $this->redirectToRoute('index');
        }
        if(!$session->get("droit"))
        {
            return $this->redirectToRoute('modos');
        }
        $login=$request->request->get('pseudo');
        if(!$login=="")
        {
            $rang=$request->request->get('rang');
            $link=$this->createLink();
            if((($rang=="0") || ($rang=="1")) && (!$link==""))
            {
                $this->createModo($login,$rang,$link);
                $session->set('addModo',"true");
                $session->set('link',$link);
                return $this->redirectToRoute('modos');
            }
        }
        return $this->render('modos/create.html.twig', [
            'route' =>'modos'
        ]);
    }
}
