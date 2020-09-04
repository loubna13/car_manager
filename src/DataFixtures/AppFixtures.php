<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Car;
use App\Entity\Model;
use Faker\Factory;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture

{
    private $encoder;
    private $faker;

       public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->faker = Factory::create();
    }



    public function load(ObjectManager $manager)
    {
            $user1 = new User();
            $user1->setEmail('test1@test.com');
            $user1->setRoles(['ROLE_ADMIN']);
            $user1->setName('barkat');
            $user1->setFirstname('loubna');
        
            $user1->setPhone('0661056494');

            $password = $this->encoder->encodePassword($user1, 'pass_1234');
            $user1->setPassword($password);

            $manager->persist($user1);
            
            
            
            for($i=0; $i<10; $i++){       
            $user2 = new User();
            $user2->setEmail($this->faker->email);
            $user2->setRoles(['']);
            $user2->setName($this->faker->name);
            $user2->setFirstname($this->faker->firstName);
        
            $user2->setPhone($this->faker->phoneNumber);
        
            $password = $this->encoder->encodePassword($user2, 'pass_1234');
            $user2->setPassword($password);
            $manager->persist($user2); 

        }

            $model1 = new Model();
            $model1->setLabel("volkswagon");
            $manager->persist($model1);

            $model2 = new Model();
            $model2->setLabel("Ford");
            $manager->persist($model2); 

            //generer des voitures pour chaque modele
            $models = [$model1,$model2];
            foreach($models as $m){
                $rand = rand(3,5);


                for($i=1; $i <= $rand; $i++){
                    $car = new Car();
                    $car->setBrand($m);
                    $car->setYear($this->faker->numberBetween($min=1999, $max=2019));
                    $car->setImage($this->faker->imageUrl($width = 640, $height = 480));
               
                    $car->setPrice($this->faker->numberBetween($min = 500, $max = 20000));
                    $car->setIsNew($this->faker->boolean($chanceOfGettingTrue = 50));
                    $manager->persist($car);
         
                 }

            }






       

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
