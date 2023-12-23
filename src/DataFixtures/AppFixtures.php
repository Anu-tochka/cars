<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Brands;
use App\Entity\Models;
use App\Entity\Programs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $programs = new Programs();
        $programs->setTitle('Premium');
        $programs->setRate(10.5);
        $manager->persist($programs);

        $programs = new Programs();
        $programs->setTitle('Standart');
        $programs->setRate(12.5);
        $manager->persist($programs);
		
        $manager->flush();
		
		$brandB = new Brands();
        $brandB->setName('BMW');
        $manager->persist($brandB);

        $brandT = new Brands();
        $brandT->setName('Toyota');
        $manager->persist($brandT);
		
        $manager->flush();
		
		$modelL = new Models();
        $modelL->setName('Land Cruiser');
        $manager->persist($modelL);

        $modelLC = new Models();
        $modelLC->setName('Land Cruiser Comfort');
        $manager->persist($modelLC);
		
		$modelX2 = new Models();
        $modelX2->setName('X2');
        $manager->persist($modelX2);

        $model1 = new Models();
        $model1->setName('1 серии');
        $manager->persist($model1);
		
        $model3 = new Models();
        $model3->setName('3 серии');
        $manager->persist($model3);
		
        $manager->flush();
		
		$cars = new Car();
        $cars->setPhoto('1.jpg');
        $cars->setPrice(1670000);
        $cars->setBrandID($brandB);
        $cars->setModelID($model1);
        $manager->persist($cars);

        $cars = new Car();
        $cars->setPhoto('2.jpg');
        $cars->setPrice(1940000);
        $cars->setBrandID($brandB);
        $cars->setModelID($model3);
        $manager->persist($cars);
		
		$cars = new Car();
        $cars->setPhoto('3.jpg');
        $cars->setPrice(1870000);
        $cars->setBrandID($brandB);
        $cars->setModelID($model1);
        $manager->persist($cars);

        $cars = new Car();
        $cars->setPhoto('4.jpg');
        $cars->setPrice(2320000);
        $cars->setBrandID($brandB);
        $cars->setModelID($modelX2);
        $manager->persist($cars);

        $cars = new Car();
        $cars->setPhoto('5.jpg');
        $cars->setPrice(5131000);
        $cars->setBrandID($brandT);
        $cars->setModelID($modelLC);
        $manager->persist($cars);
		
        $manager->flush();
    }
}
