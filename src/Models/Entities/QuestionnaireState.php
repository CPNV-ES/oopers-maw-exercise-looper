<?php

namespace App\Models\Entities;

enum QuestionnaireState
{
    case Building;
    case Answering;
    case Closed;
}