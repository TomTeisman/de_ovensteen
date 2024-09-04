<?php

namespace App\Models;

use App\Abstracts\Model;

class Role extends Model
{
    public string $name;

    /**
     * @param  string  $name  The name of the role
     * @return Role           An instance of the Role Class
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }

    public static function all(): array
    {
        $sql = "SELECT * FROM `roles`";
        return parent::executeQuery($sql);
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM `roles` WHERE `id` = :id";
        return parent::executeQuery($sql);
    }
}