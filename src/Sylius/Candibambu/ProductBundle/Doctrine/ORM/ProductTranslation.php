<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Candibambu\ProductBundle\Doctrine\ORM;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class ProductTranslationRepository
 *
 * @package Sylius\Candibambu\ProductBundle\Doctrine\ORM
 */
class ProductTranslation extends EntityRepository
{
    /**
     * Get Translation from Locale and Slug
     *
     * @param string $locale
     * @param string $slug
     *
     * @return ProductTranslation|null
     */
    public function findOneByLocaleSlug($locale, $slug)
    {
        $queryBuilder = $this->getQueryBuilder();
        $this->applyCriteria($queryBuilder, ['locale'=> $locale, 'slug' => $slug]);

        return $queryBuilder->setMaxResults(1)->getQuery()->getOneOrNullResult();
    }
    /**
     * Get Translation from Locale and Slug
     *
     * @param string $locale
     * @param string $slug
     *
     * @return ProductTranslation|null
     */
    public function countByLocaleSlug($locale, $slug)
    {
        $queryBuilder = $this->getQueryBuilder();
        $this->applyCriteria($queryBuilder, ['locale'=> $locale, 'slug' => $slug]);

        return count($queryBuilder->getQuery()->getOneOrNullResult());
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'product_translation';
    }
}
