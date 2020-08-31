<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
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




        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
