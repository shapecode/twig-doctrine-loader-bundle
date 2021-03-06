<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository;

use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Interface TemplateRepositoryInterface
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository
 * @author  Nikita Loges
 */
interface TemplateRepositoryInterface extends ObjectRepository
{

    /**
     * @param $name
     *
     * @return null|TemplateInterface
     */
    public function findOneByName($name);
}
