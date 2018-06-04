<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity\TemplateInterface;

/**
 * Class TemplateRepository
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository
 * @author  Nikita Loges
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
