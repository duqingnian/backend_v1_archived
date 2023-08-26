<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends \AppBundle\Controller\BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('FrontBundle:Home:index.html.twig');
    }
}
