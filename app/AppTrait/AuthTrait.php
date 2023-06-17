<?php
/*
 *  Project: decathlon
 *  Last Modified: 7/4/22, 5:56 PM
 * File Created: 7/4/22, 5:56 PM
 * File: AuthTrait.php
 * Path: C:/wamp64/www/decathlon/app/AppTrait/AuthTrait.php
 * Class: AuthTrait.php
 * Copyright (c) $year
 * Created by Ariful Islam
 *  All Rights Preserved By
 *  If you have any query then knock me at
 *  arif98741@gmail.com
 *  See my profile @ https://github.com/arif98741
 *
 */

namespace App\AppTrait;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return self::getUser()->id;
    }

    /**
     * @return Authenticatable|null
     */
    public function getUser()
    {
        return Auth::user();
    }

    /**
     * @return mixed
     */
    public function getUserRoleId()
    {
        return $this->getUser()->role_id;
    }

    public function getUserRoles()
    {
        return $this->getUser()->getRoleNames();
    }

    /**
     * @param $permission
     * @return void
     */
    public function givePermissionTo($permission)
    {
        $this->getUser()->givePermissionTo($permission);
    }

    /**
     * @param $role
     * @return void
     */
    public function assignRole($role)
    {
        $this->getUser()->assignRole($role);
    }


    /**
     * @return mixed
     */
    public function getAllPermissions()
    {

        return $this->getUser()->getAllPermissions();
    }

    /**
     * @return mixed
     */
    public function getDirectPermissions()
    {

        return $this->getUser()->getDirectPermissions();
    }

    /**
     * @return mixed
     */
    public function getPermissionsViaRoles()
    {
        return $this->getUser()->getPermissionsViaRoles();
    }


}
