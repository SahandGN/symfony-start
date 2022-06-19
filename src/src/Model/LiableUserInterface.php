<?php

namespace App\Model;

interface LiableUserInterface
{
    public function getCreatorUser();
    public function setCreatorUser(string $username);
    public function getUpdaterUser();
    public function setUpdaterUser(string $username);
}