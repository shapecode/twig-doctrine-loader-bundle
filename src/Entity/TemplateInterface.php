<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity;

/**
 * Interface TemplateInterface
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces
 * @author  Nikita Loges
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

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt(\DateTime $modifiedAt);
}
