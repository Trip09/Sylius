<?php

namespace Sylius\Candibambu\ProductBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Doctrine\Common\Collections\Collection;
use Sylius\Candibambu\ProductBundle\Entity\ProductTranslation;
/**
 * Class Product
 *
 * @package Candibambu\ProductBundle
 */
class Product extends BaseProduct
{
    use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;

    /** @var Collection|Translatable */
    protected $translations;


    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->translations = new ArrayCollection();
    }

    public function getSlug()
    {
        return (false !== $this->getCurrentTranslation())
            ? $this->getCurrentTranslation()->getSlug()
            : '';
    }

    public function getName()
    {
        return (false !== $this->getCurrentTranslation())
            ? $this->getCurrentTranslation()->getName()
            : '';
    }

    public function getDescription()
    {
        return (false !== $this->getCurrentTranslation())
            ? $this->getCurrentTranslation()->getDescription()
            : '';
    }
}
