<?php

namespace App\Entity;

enum ContentLengthValidation
{
    case NOT_GOOD_ENOUGH;
    case SUFFICIENT;
    case VERY_GOOD;
}