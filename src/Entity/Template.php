<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces\TemplateInterface;

/**
 * Class Template
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity(repositoryClass="Shapecode\Bundle\TwigDoctrineLoaderBundle\Repository\TemplateRepository")
 */
class Template implements TemplateInterface
{

    /**
     * @var integer
     * @ORM\Column(type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $code;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $enable;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return bool
     */
    public function isEnable()
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }
}
