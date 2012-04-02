<?php

namespace BehaviorFixtures\ORM;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors as ModelBehaviors;

/**
 * @ORM\Entity
 */
class SoftDeletableEntity
{
    use ModelBehaviors\SoftDeletable;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Returns object id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
