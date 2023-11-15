<?php

namespace App\Models\Entities;

enum QuestionnaireState: string
{
    case Building = 'Building';
    case Answering = 'Answering';
    case Closed = 'Closed';
}