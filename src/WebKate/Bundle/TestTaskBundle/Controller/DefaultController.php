<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $projects = $this->getDoctrine()
            ->getManager()
            ->getRepository('WebKateTestTaskBundle:Project')
            ->findAll()
            ;

        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array(
            'projects' => $projects
        ));
    }
}
