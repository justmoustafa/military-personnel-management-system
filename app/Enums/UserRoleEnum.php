<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case Admin = 'admin';
    case AffairsSoldier = 'affairs_soldier';
    case OperatorsSoldier = 'operators_soldier';
}
