<?php

namespace App\Http\Transformers;

use App\Http\Transformers\TransformerAbstract;

class AddressTransformer extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'map_data' => $data
        ];
    }
}
