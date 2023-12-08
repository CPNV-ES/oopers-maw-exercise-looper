<?php

namespace App\Entity;

enum QuestionKind: string
{
    case SingleLineText = 'SingleLineText';
    case ListOfSingleLines = 'ListOfSingleLines';
    case MultilineText = 'MultilineText';
}