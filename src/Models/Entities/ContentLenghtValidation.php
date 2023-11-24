<?php

namespace App\Models\Entities;

enum ContentLenghtValidation
{
    case NotGoodEnough;
    case Sufficient;
    case VeryGood;
}