<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebKate\Bundle\TestTaskBundle\Entity\Executor;
use WebKate\Bundle\TestTaskBundle\Form\Type\ExecutorType;

class DefaultController extends Controller
{

    public function createExecutorAction(Request $request)
    {
        $executor = new Executor();
        $form = $this->createForm(new ExecutorType(), $executor);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $om = $this->getDoctrine()->getManager();
            $om->persist($form->getData());
            $om->flush();

            return $this->redirect($this->generateUrl('_homepage'));
        }

        return $this->render('WebKateTestTaskBundle:Default:createExecutor.html.twig', array(
            'form' => $form->createView(),
        ));
    }

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
