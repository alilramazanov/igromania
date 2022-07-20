<?php

namespace App\Http\DtoObjects\Igromania;

use App\Http\DtoObjects\DtoCore;


/**
 * @OA\Schema (
 *     title="UserDto",
 *     description="user-dto body data",
 *     type="object",
 *     required={"name"},
 *
 * )
 */
class UserDto extends DtoCore
{




    /**
     * @OA\Property(
     *     title="id",
     *     type="integer",
     *     description="id of user",
     *     example=1
     * )
     * @var $id integer
     */
    protected $id;

    /**
     * @OA\Property(
     *     title="name",
     *     type="string",
     *     description="name of user",
     *     example="Alex"
     * )
     * @var $name string
     */
    protected $name;

    /**
     * @OA\Property(
     *     title="name",
     *     type="string",
     *     description="email of user",
     *     example="alex@gmail.com"
     * )
     * @var $email string
     */
    protected $email;

    /**
     * @OA\Property(
     *     title="name",
     *     type="string",
     *     description="password of user",
     *     example="alex1234"
     * )
     * @var $password string
     */
    protected $password;

    /**
     * @OA\Property(
     *     title="role_id",
     *     type="integer",
     *     description="role of user",
     *     example=2
     * )
     * @var $role_id integer
     */
    protected $role_id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  mixed  $name
     * @return UserDto
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param  mixed  $email
     * @return UserDto
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param  mixed  $password
     * @return UserDto
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param  mixed  $role_id
     * @return UserDto
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
        return $this;
    }


}