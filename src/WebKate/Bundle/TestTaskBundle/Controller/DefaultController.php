<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array('name' => $name));
    }
}
