<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebKate\Bundle\TestTaskBundle\Entity\Executor;
use WebKate\Bundle\TestTaskBundle\Form\Type\ExecutorType;

class DefaultController extends Controller
{

    public function indexAction()
    {

        $categories = $this->get('web_kate_test_task_bundle.tree_structure')
            ->getCategoriesWithProjects();

        $projects = $this->get('web_kate_test_task_bundle.tree_structure')
            ->getProjectsWithExecutors();

        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array(
            'projects' => $projects,
            'categories' => $categories,
        ));
    }

    public function executorsAction()
    {
        $executors = $this->get('web_kate_test_task_bundle.executor.repository')
            ->findAllOrderByCareerBeggining()
        ;

        return $this->render('WebKateTestTaskBundle:Default:executors.html.twig', array(
            'executors' => $executors,
        ));
    }
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

}
