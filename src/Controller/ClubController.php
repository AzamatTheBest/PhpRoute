<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;




class ClubController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('base.html.twig');
    }


    #[Route('/barcelona', name: 'barca')]
    public function barcelona()
    {
        return $this->render('barca.html.twig');
    }


    #[Route('/astana', name: 'astana')]
    public function astana()
    {
        return $this->render('astana.html.twig');
    }


    #[Route('/mancity', name: 'mancity')]
    public function mancity()
    {
        return $this->render('mancity.html.twig');
    }
}