<?php

Namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController {

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route ("/", name="home")
     */
    public function home(): Response {
//        echo getcwd();
        return new Response($this->twig->render('pages/home.html.twig'));
//        exit(0);
    }
}