<?php

namespace WebKate\Bundle\TestTaskBundle\TreeStructure;

use WebKate\Bundle\TestTaskBundle\Entity\ExecutorRepository;
use Doctrine\ORM\EntityManager;

class TreeStructure
{
    protected $em;

    protected $executorRepository;

    public function __construct(ExecutorRepository $executorRepository, EntityManager $em)
    {
        $this->executorRepository = $executorRepository;
        $this->em = $em;
    }

    public function getCategoriesProjects()
    {
    }
}