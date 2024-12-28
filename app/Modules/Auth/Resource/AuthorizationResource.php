<?php

namespace App\Modules\Auth\Resource;

class AuthorizationResource
{
    protected static $features = ["USER", "ROLE_PERMISSION", "MEDIA"];
    protected static $actions = ["VIEW", "CREATE", "EDIT", "UPDATE", "DELETE"];
    protected static $roles = ["SUPERUSER", "DEFAULT"];

    public static function getFeatures()
    {
        return self::$features;
    }

    public static function getActions()
    {
        return self::$actions;
    }

    public static function getPermissions()
    {
        $combinations = [];

        foreach (self::$actions as $action) {
            foreach (self::$features as $feature) {
                $combinations[] = "{$action}_{$feature}";
            }
        }

        return $combinations;
    }

    public static function getRoles()
    {
        return self::$roles;
    }
}
