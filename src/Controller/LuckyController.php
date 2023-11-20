<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route("/lucky/number", name: "lucky")]
    public function number(Request $request, SessionInterface $session): Response
    {
        $min = $request->query->get("min");
        $max = $request->query->get("max");

        if (!$min or !$max) {
            throw $this->createNotFoundException("404");
        }

        $number = random_int($min, $max);
        
        echo($session->get("THEnumber"));
        return $this->render("lucky/number.html.twig", ["number" => $number, "min" => $min, "max" => $max, "THE_number" => $session->get("THEnumber")]);
    }

    
}
