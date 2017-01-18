<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Twig\Loader;

use Doctrine\ORM\EntityManagerInterface;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository\TemplateRepositoryInterface;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces\TemplateInterface;

/**
 * Class DoctrineLoader
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Twig\Loader
 * @author  Nikita Loges
 */
class DoctrineLoader implements \Twig_LoaderInterface, \Twig_SourceContextLoaderInterface, \Twig_ExistsLoaderInterface
{

    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function getSource($name)
    {
        return $this->getTemplate($name)->getCode();
    }

    /**
     * @inheritDoc
     */
    public function getSourceContext($name)
    {
        $template = $this->getTemplate($name);

        return new \Twig_Source($template->getCode(), $name);
    }

    /**
     * @inheritdoc
     */
    public function getCacheKey($name)
    {
        return 'doctrine_' . $name;
    }

    /**
     * @inheritdoc
     */
    public function isFresh($name, $time)
    {
        return $this->getTemplate($name)->getModifiedAt()->getTimestamp() <= $time;
    }

    /**
     * @inheritDoc
     */
    public function exists($name)
    {
        $template = $this->getRepository()->findOneByName($name);

        if (is_null($template)) {
            return false;
        }

        if (!$template->isEnable()) {
            return false;
        }

        return true;
    }

    /**
     * @param $name
     *
     * @return TemplateInterface
     * @throws \Twig_Error_Loader
     */
    protected function getTemplate($name)
    {
        /** @var TemplateInterface $template */
        $template = $this->getRepository()->findOneByName($name);

        if ($template === null) {
            throw new \Twig_Error_Loader(sprintf('Unable to find template "%s".', $name));
        }

        return $template;
    }

    /**
     * @return TemplateRepositoryInterface
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(TemplateInterface::class);
    }
}
