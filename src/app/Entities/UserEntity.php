<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    public function hasPermission(string $permission) {
        return $this->User_Type === $permission;
    }
}