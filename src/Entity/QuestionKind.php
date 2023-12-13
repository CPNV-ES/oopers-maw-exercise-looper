<?php

namespace App\Entity;

enum QuestionKind: string
{
    case SINGLE_LINE_TEXT = 'SingleLineText';
    case LIST_OF_SINGLE_LINES = 'ListOfSingleLines';
    case MULTILINE_TEXT = 'MultilineText';
}