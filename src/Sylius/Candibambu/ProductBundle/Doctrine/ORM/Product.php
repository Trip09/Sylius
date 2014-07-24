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

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;

/**
 * Product repository.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class Product extends BaseProductRepository
{
    /**
     * @param array $criteria
     *
     * @return null|object
     */
    public function findOneBy(array $criteria)
    {
        $slug = false;
        $queryBuilder = $this->getQueryBuilder();

        if (isset($criteria['slug'])) {
            $slug = $criteria['slug'];
            unset($criteria['slug']);
        }
        $this->applyCriteria($queryBuilder, $criteria);

        if (false !== $slug) {
            $queryBuilder
                ->leftJoin($this->getAlias().'.translations', 't', 'WITH', 't.slug = :slug')
                ->setParameters(array('slug' => $slug));
        }

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

}
