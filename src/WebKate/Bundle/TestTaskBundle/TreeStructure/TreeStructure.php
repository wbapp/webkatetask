<?php

namespace WebKate\Bundle\TestTaskBundle\TreeStructure;

use Doctrine\ORM\EntityManager;
use WebKate\Bundle\TestTaskBundle\Entity\ExecutorRepository;
use WebKate\Bundle\TestTaskBundle\Entity\CategoryRepository;
use WebKate\Bundle\TestTaskBundle\Entity\ProjectRepository;

class TreeStructure
{
    /**
     * @var EntityManager
     */
    protected $em;

    protected $executorRepository;

    public function __construct(ExecutorRepository $executorRepository, EntityManager $em)
    {
        $this->executorRepository = $executorRepository;
        $this->em = $em;
    }

    public function getCategoriesWithProjects()
    {
        $categories = $this->em->getRepository('WebKateTestTaskBundle:Category')
            ->findCategoriesAssociatedWithProjects();

        foreach($categories as $category) {
            $category->setProjects(
                $this->em->getRepository('WebKateTestTaskBundle:Project')
                    ->findProjectsByCategoryId($category->getId()));
        }

        return $categories;
    }

    public function getProjectsWithExecutors()
    {
        $projects = $this->em->getRepository('WebKateTestTaskBundle:Project')
            ->findProjectsAssociatedWithExecutors()
        ;

        foreach($projects as $project) {
            $project->setExecutors(
                $this->em->getRepository('WebKateTestTaskBundle:Executor')
                    ->findExecutorsByProject($project->getId()));
        }

        return $projects;
    }
}