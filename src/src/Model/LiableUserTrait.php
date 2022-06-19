<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;


trait LiableUserTrait
{

    #[ORM\Column(type: 'string',nullable: true)]
    private $creatorUser;


    #[ORM\Column(type: 'string',nullable: true)]
    private $updaterUser;



    /**
     * @return mixed
     */
    public function getCreatorUser()
    {
        return $this->creatorUser;
    }

    /**
     * @param mixed $creatorUser
     */
    public function setCreatorUser($creatorUser): void
    {
        $this->creatorUser = $creatorUser;
    }

    /**
     * @return mixed
     */
    public function getUpdaterUser()
    {
        return $this->updaterUser;
    }

    /**
     * @param mixed $updaterUser
     */
    public function setUpdaterUser($updaterUser): void
    {
        $this->updaterUser = $updaterUser;
    }




}