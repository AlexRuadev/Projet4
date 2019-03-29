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

/**
 * @UniqueEntity(fields={"Parents_pseudo"}, message="There is already an account with this Parents_pseudo")
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
}