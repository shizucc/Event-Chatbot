<?php

namespace App\Enums;

enum RegistrationState: string
{
    case START = 'start';
    case ASK_NAME = 'ask_name';
    case ASK_EMAIL = 'ask_email';
    case ASK_CITY = 'ask_city';
    case CONFIRMATION = 'confirmation';
    case COMPLETED = 'completed';
}