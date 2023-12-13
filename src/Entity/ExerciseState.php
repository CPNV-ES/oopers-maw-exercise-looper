<?php

namespace App\Entity;

enum ExerciseState: string
{
    case BUILDING = 'Building';
    case ANSWERING = 'Answering';
    case CLOSED = 'Closed';
}