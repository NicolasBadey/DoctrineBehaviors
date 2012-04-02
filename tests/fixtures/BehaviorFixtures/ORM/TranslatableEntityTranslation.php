<?php

namespace BehaviorFixtures\ORM;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors as ModelBehaviors;

/**
 * @ORM\Entity
 */
class TranslatableEntityTranslation
{
    use ModelBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}
