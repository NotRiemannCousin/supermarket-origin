<?php
include_once 'permission.enum.php';
include_once 'user.class.php';


class CleaningAssistant extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::AddProducts,
        Permission::EditProducts,
        Permission::SeeOthers,
        Permission::EditOthers
    ];
}
class StocHelper extends User
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
class SecurityGuard extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::SeeOthers,
        Permission::EditOthers
    ];
}
class AdministrativeAssistant extends User
{
    protected $permissions = [
        Permission::SeeProducts,
        Permission::SeeOthers
    ];
}
