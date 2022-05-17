<?php

namespace App\Enum;

enum SupportEnum: string
{
    case P = 'Pending';
    case A = 'Awaiting Student';
    case C = 'Complete';
}
