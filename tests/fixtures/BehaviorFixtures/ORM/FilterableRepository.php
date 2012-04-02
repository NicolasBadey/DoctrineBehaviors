<?php

namespace BehaviorFixtures\ORM;

use Knp\DoctrineBehaviors as ModelBehaviors;
use Doctrine\ORM\EntityRepository;

/**
 * @author     Leszek Prabucki <leszek.prabucki@gmail.com>
 */
class FilterableRepository extends EntityRepository
{
    use ModelBehaviors\Filterable\FilterableRepository;

    public function getLikeFilterColumns()
    {
        return ['e:name'];
    }

    public function getEqualFilterColumns()
    {
        return ['e:code'];
    }
}
