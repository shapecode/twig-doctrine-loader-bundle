<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces\TemplateInterface;

/**
 * Interface TemplateRepositoryInterface
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository
 * @author  Nikita Loges
 * @company tenolo GbR
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
