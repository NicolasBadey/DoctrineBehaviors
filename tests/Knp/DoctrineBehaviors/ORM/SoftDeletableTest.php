<?php

namespace Tests\Knp\DoctrineBehaviors\ORM;

use Doctrine\Common\EventManager;

require_once 'EntityManagerProvider.php';

class SoftDeletableTest extends \PHPUnit_Framework_TestCase
{
    use EntityManagerProvider;

    protected function getUsedEntityFixtures()
    {
        return array(
            'BehaviorFixtures\\ORM\\SoftDeletableEntity'
        );
    }

    protected function getEventManager()
    {
        $em = new EventManager;

        $em->addEventSubscriber(new \Knp\DoctrineBehaviors\ORM\SoftDeletable\SoftDeletableListener);

        return $em;
    }

    public function testDelete()
    {
        $em = $this->getEntityManager();

        $entity = new \BehaviorFixtures\ORM\SoftDeletableEntity();

        $em->persist($entity);
        $em->flush();

        $this->assertNotNull($id = $entity->getId());

        $em->remove($entity);
        $em->flush();
        $em->clear();

        $entity = $em->getRepository('BehaviorFixtures\ORM\SoftDeletableEntity')->find($id);

        $this->assertNotNull($entity);
        $this->assertTrue($entity->isDeleted());
    }
}
