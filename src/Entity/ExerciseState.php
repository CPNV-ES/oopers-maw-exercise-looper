<?php

namespace App\Entity;

enum ExerciseState: string
{
    case Building = 'Building';
    case Answering = 'Answering';
    case Closed = 'Closed';
}