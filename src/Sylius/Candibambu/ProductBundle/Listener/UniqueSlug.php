<?php

namespace Sylius\Candibambu\ProductBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Sylius\Candibambu\ProductBundle\Entity\ProductTranslation as EntityProductTranslation;

class UniqueSlug
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof EntityProductTranslation) {
            $this->validate($entity, $entityManager);
        }

    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof EntityProductTranslation) {
            $this->validate($entity, $entityManager);
        }

    }

    protected function validate($entity, $em)
    {
        $slug = $entity->getSlug();
        $repository = $em->getRepository(get_class($entity));

        while (0 !== $repository->countByLocaleSlug($entity->getLocale(), $slug)) {
            $slug = $this->buildSlug($entity, $slug);
        }

        $entity->setSlug($slug);
    }

    protected function buildSlug($entity, $slugCurrent)
    {
        $time = 0;
        $lastPart = substr($slugCurrent, (strripos($slugCurrent, '-') + 1));
        if ($lastPart !== false && preg_match('/^\d*$/', $lastPart)) {
            $time = time();
        }

        return $entity->getSlug() . '-' . ($entity->getId() + $time);
    }
}