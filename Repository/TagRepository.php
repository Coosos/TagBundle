<?php

namespace Coosos\TagBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagRepository extends EntityRepository
{
    /**
     * @param null|string $searchTag
     * @param int         $maxResult
     * @return array
     */
    public function getTagList($searchTag = null, int $maxResult = null)
    {
        $query = $this->createQueryBuilder("t");

        $query->select("t");

        if ($searchTag) {
            $query->where("t.name LIKE :tag");
            $query->setParameter("tag", "%" . $searchTag . "%");
        }

        if ($maxResult) {
            $query->setMaxResults($maxResult);
        }

        return $query->getQuery()->getResult();
    }
}
