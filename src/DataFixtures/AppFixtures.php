<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Project;
use App\Entity\Task;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

    for($i=1; $i < 3; $i++){
        $user = new User();
        $user->setEmail("mail" . $i . "@gmail.com");
        $password = $this->encoder->encodePassword($user, "password" . $i);
        $user->setPassword($password);
        $user->setFirstname("Firstname " . $i);
        $user->setLastname("Lastname " . $i);
        $user->setBirthdate(new \DateTime());
        $user->setRoles([]);

        for($j=1; $j < 3; $j++){
            $project = new Project();
            $project->setTitle("Titre" . $j);
            $project->setDate(new \DateTime());
            $project->setCategory("Category" .$j);
            $project->setDeadline(new \DateTime());
            $project->setDate(new \DateTime());
            $project->setClient("Client" . $j);
            $project->setDescription("Lorem ipsum");
            $project->setUser($user);

            $manager->persist($project);

            for($k=1; $k < 10 ; $k++){
                $task = new Task();
                $task->setTitle("titre" .$k);
                $task->setDate(new \DateTime());
                $task->setDeadline(new \DateTime());
                $task->setDescription("Nouvelle tâche" .$k);
                $task->setState("false");
                $task->setProject($project);

               
                $manager->persist($task);
            }
        }
        $manager->persist($user);
    }
    $manager->flush();
    }
}

