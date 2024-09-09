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
        return self::executeQuery($sql);
    }

    public static function find($id): array
    {
        $sql = "SELECT * FROM `roles` WHERE `id` = :id";
        $id = ['id' => $id];
        
        $role = self::executeQuery($sql, $id);
        return $role[0];
    }

    public function save(): bool
    {
        $sql = "INSERT INTO `roles` (`name`) VALUES (:name);";
        $parameters = ['name' => $this->name];

        return self::executeQuery($sql, $parameters);
    }

    public function update($id): bool
    {
        $sql = "UPDATE `roles` SET `name` = :name WHERE `id` = :id";
        $parameters = [
            'id' => $id,
            'name' => $this->name
        ];

        return self::executeQuery($sql, $parameters);
    }

    public static function delete($id): bool
    {
        $sql = "DELETE FROM `roles` WHERE `id` = :id";
        $parameters = ['id' => $id];

        return self::executeQuery($sql, $parameters);
    }
}