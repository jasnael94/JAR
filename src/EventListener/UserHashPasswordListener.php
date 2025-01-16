<?php
namespace App\EventListener ;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsEntityListener(event: Events::prePersist, method:'persist', entity: User::class)]
class UserHashPasswordListener
{   public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {

    }
    public function prePersist(User $user): void
    {
        $password= $user->getPassword();
        $user->setPassword($this->userPasswordHasher->hashPassword($user,$password));

    }
}


?>