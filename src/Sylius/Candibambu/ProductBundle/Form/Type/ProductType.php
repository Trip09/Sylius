<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Candibambu\ProductBundle\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ProductType as BaseProductType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class ProductType extends BaseProductType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->remove('name')->remove('slug')->remove('description')->remove('shortDescription')
            ->add('translations', 'a2lix_translations');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                    'data_class'        => $this->dataClass,
                    'validation_groups' => $this->validationGroups
                ))
        ;
    }
}
