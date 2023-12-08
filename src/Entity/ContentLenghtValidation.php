<?php

namespace App\Entity;

enum ContentLenghtValidation
{
    case NotGoodEnough;
    case Sufficient;
    case VeryGood;
}