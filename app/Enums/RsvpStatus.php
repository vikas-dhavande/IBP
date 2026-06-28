<?php

namespace App\Enums;

enum RsvpStatus: string
{
    case Attending = 'attending';
    case Waitlisted = 'waitlisted';
    case Cancelled = 'cancelled';
}
