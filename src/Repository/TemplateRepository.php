<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository\TemplateRepositoryInterface;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces\TemplateInterface;

/**
 * Class TemplateRepository
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TemplateRepository extends EntityRepository implements TemplateRepositoryInterface
{

    /**
     * @param $name
     *
     * @return null|TemplateInterface
     */
    public function findOneByName($name)
    {
        return $this->findOneBy([
            'name' => $name
        ]);
    }
}
