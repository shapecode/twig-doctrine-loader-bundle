<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces;

/**
 * Interface TemplateInterface
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface TemplateInterface
{

    /**
     * @return integer
     */
    public function getId();

    /**
     * @param integer $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getCode();

    /**
     * @param string $code
     */
    public function setCode($code);

    /**
     * @return bool
     */
    public function isEnable();

    /**
     * @param bool $enable
     */
    public function setEnable($enable);
}
