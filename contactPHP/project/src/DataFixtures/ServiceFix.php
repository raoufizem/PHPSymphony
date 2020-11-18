<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Service;

class ServiceFix extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $service1=new Service();
        $service1->setName("IT")
                 ->setMailOne("aminebouz84@gmail.com")
                 ->setMail2(" ");

        $service2=new Service();
        $service2->setName("Custome service")
                 ->setMailOne("aminebouz84@gmail.com")
                 ->setMail2("amineuh_xox@live.fr");

        $manager->persist($service1);
        $manager->persist($service2);

        $manager->flush();
    }
}
