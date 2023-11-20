<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController{
    #[Route("/redirect", name:"redirect")]
    public function redirection(SessionInterface $session){
        $session->set("THEnumber", 51);
        $this->addFlash("warning", "votre redirection s'est bien passée");
        return $this->redirectToRoute("lucky", ["min" => 50, "max" => 52]);
   }
}