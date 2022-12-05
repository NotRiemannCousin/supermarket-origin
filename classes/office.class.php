<?php
include_once 'permission.enum.php.php';
include_once 'user.class.php';


class Administrator extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::AddProducts,
        Permission::EditProducts,
        Permission::SeeOthers,
        Permission::EditOthers
    ];
}
class CommonUser extends User
{
    protected $permissions = [
        Permission::SeeProducts
    ];
}
class Cashier extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::AddProducts,
        Permission::EditProducts
    ];
}
class HRManager extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::SeeOthers,
        Permission::EditOthers
    ];
}
class Counter extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::SeeOthers
    ];
}
