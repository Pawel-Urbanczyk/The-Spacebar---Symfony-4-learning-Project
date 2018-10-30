<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 22/10/2018
 * Time: 13:45
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class BaseFixtures extends Fixture
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @var array
     */
    private $referencesIndex = [];

    abstract protected function loadData(ObjectManager $em);

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->faker = Factory::create();

        $this->loadData($manager);
    }

    protected function createMany(string $className, int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++ ){
            $entity = new $className();
            $factory($entity, $i);

            $this->manager->persist($entity);
            //store for usage laster as App\Entity\ClassName_#COUNT#
            $this->addReference($className . '_' . $i, $entity);
        }
    }

    protected function getRandomReference(string $className)
    {
        if(!isset($this->referencesIndex[$className])){
            $this->referencesIndex[$className] = [];


        foreach ($this->referenceRepository->getReferences() as $key => $reference){
            if(strpos($key, $className.'_') === 0){
                $this->referencesIndex[$className][] = $key;
            }
        }
    }

    if(empty($this->referencesIndex[$className])){
            throw new \Exception(sprintf('Cannot find any references for class'));
    }

    $randomReferenceKey = $this->faker->randomElement($this->referencesIndex[$className]);

        return $this->getReference($randomReferenceKey);

    }
}