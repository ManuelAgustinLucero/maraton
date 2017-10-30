<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    /**
     * @Route("/informacion", name="informacion")
     */
    public function infoction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/info.html.twig');
    }

    /**
     * @Route("/recorrido", name="recorrido")
     */
    public function recorridoAction(Request $request)
    {
        return $this->render('default/recorrido.html.twig');
    }
}
