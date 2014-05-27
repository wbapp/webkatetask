<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebKate\Bundle\TestTaskBundle\Entity\Executor;
use WebKate\Bundle\TestTaskBundle\Entity\ExecutorRepository;
use WebKate\Bundle\TestTaskBundle\Form\Type\ExecutorType;
use WebKate\Bundle\TestTaskBundle\TreeStructure\TreeStructure;

class DefaultController extends Controller
{
    public function createExecutorAction()
    {
        $executor = new Executor();

        $form = $this->createForm(new ExecutorType(), $executor);

        $form->handleRequest($this->getRequest());
        if ($form->isValid()) {
            $om = $this->getDoctrine()->getManager();
            $om->persist($form->getData());
            $om->flush();

            return $this->redirect($this->generateUrl('_web_kate_test_task_homepage'));
        }

        return $this->render('WebKateTestTaskBundle:Default:createExecutor.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function indexAction($name)
    {
        $om = $this->getDoctrine()->getManager()->getRepository('WebKateTestTaskBundle:Project');
        $projects = $om->findAll();

        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array('name' => $name,
                                                                                   'projects' =>$projects));
    }
}
