<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Modo;

class ModoController extends AbstractController
{

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

    private function createModo(string $login, string $rang, string $link)
    {
        $manager=$this->getDoctrine()->getManager();
        $modo = new Modo();
        $modo->setPseudo($login);
        $modo->setRoles($rang);
        $modo->setLink($link);
        $modo->setLinkIsUsed(false);
        $manager->persist($modo);
        $manager->flush();
    }
    /**
     * @Route("/modo", name="modo")
     */
    public function list(): Response
    {
        if($this->getUser()==null)
            return $this->redirectToRoute('index');
        $session = new Session();
        $link= $session->get("link");
        $add= $session->get("addModo");
        $session->remove("link");
        $session->remove("addModo");
        $modosRepo=$this->getDoctrine()->getRepository(Modo::class);
        return $this->render('modo/list.html.twig', [
            'modos' => $modosRepo->findAll(),
            'roles' => $session->get("droit"),
            'add' => $add,
            'link' => $link,
            'route' =>'modo'
        ]);
    }

    public function add(): Response
    {
        if($this->getUser()==null)
            return $this->redirectToRoute('index');
        $session = new Session();
        $request = Request::createFromGlobals();
        $login=$request->request->get('pseudo');
        $rank=$request->request->get('roles');
        $link=$this->generateRandomString();
        if(!$login=="")
        {
            $this->createModo($login,$rank,$link);
            $session->set('addModo',"true");
            $session->set('link',$link);
            return $this->redirectToRoute('modo');
        }
        return $this->render('modo/add.html.twig', [
            'route' =>'modo'
        ]);
    }
}
