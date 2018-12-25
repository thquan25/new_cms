<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
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
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, '123456'));
        $user1->setRoles(array('ROLE_ADMIN'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('tester@silkwires.com');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, '123456'));
        $user2->setRoles(array('ROLE_ADMIN'));
        $manager->persist($user2);

        $manager->flush();
    }
}
