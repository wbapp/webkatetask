<?php

namespace WebKate\Bundle\TestTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebKate\Bundle\TestTaskBundle\Entity\Executor;
use WebKate\Bundle\TestTaskBundle\Form\Type\ExecutorType;
use WebKate\Bundle\TestTaskBundle\Entity\Category;
use WebKate\Bundle\TestTaskBundle\Entity\Project;
use WebKate\Bundle\TestTaskBundle\Entity\CategoryRepository;

class DefaultController extends Controller
{

    public function indexAction()
    {
//        $projects = $this->getDoctrine()
//            ->getManager()
//            ->getRepository('WebKateTestTaskBundle:Project')
//            ->findAll()
//        ;
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WebKateTestTaskBundle:Category')
            ->getCategoriesWithProjects()
        ;

        $projects = $em->getRepository('WebKateTestTaskBundle:Project')
            ->getProjectsWithExecutors()
        ;


        var_dump($projects);

//        $executors = $this->get('web_kate_test_task_bundle.executor.repository')
//            ->findAllOrderByCareerBeggining()
//        ;

        foreach($categories as $category) {
            $category->setProjects(
                $em->getRepository('WebKateTestTaskBundle:Project')
                    ->findProjectsByCategoryId($category->getId()));
        }

        foreach($projects as $project) {
            $project->setExecutors(
                $em->getRepository('WebKateTestTaskBundle:Executor')
                    ->findExecutorsByProject($project->getId()));
        }

        return $this->render('WebKateTestTaskBundle:Default:index.html.twig', array(
            'projects' => $projects,
            'categories' => $categories,
//            'executors' => $executors,
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

//    public function treeAction()
//    {
//        $categories = $this->getDoctrine()
//            ->getRepository('WebKateTestTaskBundle:Category')
//            ;
//
//        return $this->render('WebKateTestTaskBundle:Default:tree.html.twig', array(
//            'categories' => $categories,
//        ));
//    }

}
