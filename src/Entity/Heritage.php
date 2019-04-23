<?php
/**
 * Created by PhpStorm.
 * User: Batou
 * Date: 29/03/2019
 * Time: 16:37
 */

namespace App\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use phpDocumentor\Reflection\Types\Parent_;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(fields={"Parents_pseudo"}, message="There is already an account with this Parents_pseudo")
 * @ORM\Table(name="Heritage")
 * @ORM\Entity
 */
class Heritage extends Parents
{
    public function getUsername()
    {
        parent::getUsername();
    }

    public function getPassword()
    {
        parent::getPassword();
    }

    public function eraseCredentials()
    {
        parent::eraseCredentials();
    }

    public function getRoles()
    {
        parent::getRoles();
    }

    public function getSalt()
    {
        parent::getSalt();
    }

    public function setParents_Pseudo(string $Parents_pseudo)
    {
        parent::setParentsPseudo($Parents_pseudo);
    }

    public function getPlainPassword()
    {
        parent::getPlainPassword();
    }

    public function setPlainPassword($password)
    {
        parent::setPlainPassword($password);
    }

}