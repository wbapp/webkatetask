<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebKate\Bundle\TestTaskBundle\Entity\Executor;
use WebKate\Bundle\TestTaskBundle\Entity\ExecutorRepository;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $om = $this->getDoctrine()->getManager()->getRepository('WebKateTestTaskBundle:Executor');
        $executors = $om->findAllOrderByCareerBeggining();
        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array('name' => $name,
                                                                                    'executors' =>$executors));
    }
}
