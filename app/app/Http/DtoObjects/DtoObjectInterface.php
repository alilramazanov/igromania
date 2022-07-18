<?php

namespace App\Http\DtoObjects;

use Illuminate\Foundation\Http\FormRequest;

interface DtoObjectInterface
{
    public function toArray(): array;

}