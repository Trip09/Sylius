<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Sylius\Bundle\CoreBundle\Kernel\Kernel;

/**
 * Sylius application kernel.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = array(
            new \A2lix\I18nDoctrineBundle\A2lixI18nDoctrineBundle(),
            new \A2lix\TranslationFormBundle\A2lixTranslationFormBundle(),
            new \Sylius\Candibambu\ProductBundle\SyliusCandibambuProductBundle(),

        );

        return array_merge(parent::registerBundles(), $bundles);
    }
}
