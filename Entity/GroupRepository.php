<?php

namespace RtxLabs\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GroupRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
                    ->createQuery('SELECT g, u FROM RtxLabsUserBundle:Group g LEFT JOIN g.users u WHERE g.deletedAt IS NULL')
                    ->getResult();
    }
}