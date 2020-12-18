<?php

namespace App\Http\Transformers;

abstract class TransformerAbstract
{
    abstract protected function transform($data);
}
