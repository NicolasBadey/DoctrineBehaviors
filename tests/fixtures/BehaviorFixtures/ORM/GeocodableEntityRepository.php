<?php

namespace BehaviorFixtures\ORM;

use Knp\DoctrineBehaviors as ModelBehaviors;
use Doctrine\ORM\EntityRepository;

/**
 * @author     Florian Klein <florian.klein@free.fr>
 */
class GeocodableEntityRepository extends EntityRepository
{
    use ModelBehaviors\Geocodable\GeocodableRepository;
}

