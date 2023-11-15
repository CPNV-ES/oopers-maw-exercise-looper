<?php

namespace App\Models\Entities;

enum QuestionKind
{
    case SingeLineText;
    case ListOfSingleLines;
    case MultilineText;
}