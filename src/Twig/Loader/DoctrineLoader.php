<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\Twig\Loader;

use Doctrine\Common\Persistence\ManagerRegistry;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Doctrine\Repository\TemplateRepositoryInterface;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Model\Interfaces\TemplateInterface;
use Twig\Error\LoaderError;
use Twig\Loader\ExistsLoaderInterface;
use Twig\Loader\LoaderInterface;
use Twig\Loader\SourceContextLoaderInterface;

/**
 * Class DoctrineLoader
 *
 * @package Shapecode\Bundle\TwigDoctrineLoaderBundle\Twig\Loader
 * @author  Nikita Loges
 */
class DoctrineLoader implements LoaderInterface, SourceContextLoaderInterface, ExistsLoaderInterface
{

    /** @var ManagerRegistry */
    protected $registry;

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
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

        if ($template === null) {
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
     * @throws LoaderError
     */
    protected function getTemplate($name)
    {
        /** @var TemplateInterface $template */
        $template = $this->getRepository()->findOneByName($name);

        if ($template === null) {
            throw new LoaderError(sprintf('Unable to find template "%s".', $name));
        }

        return $template;
    }

    /**
     * @return TemplateRepositoryInterface
     */
    protected function getRepository()
    {
        return $this->registry->getRepository(TemplateInterface::class);
    }
}
