<?php

namespace App\Models\Entities;

enum QuestionKind: string
{
    case SingeLineText = 'SingeLineText';
    case ListOfSingleLines = 'ListOfSingleLines';
    case MultilineText = 'MultilineText;
}