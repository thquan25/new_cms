<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('admin@silkwires.com');
        $user1->setUsername('Admin');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, '123456'));
        $user1->setRoles(array('ROLE_ADMIN'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('tester@silkwires.com');
        $user2->setUsername('Superadmin');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, '123456'));
        $user2->setRoles(array('ROLE_SUPER_ADMIN'));
        $manager->persist($user2);

        $manager->flush();
        
        $this->addReference('admin-user', $user1);
    }

    public function getOrder()
    {
        return 1;
    }
}
