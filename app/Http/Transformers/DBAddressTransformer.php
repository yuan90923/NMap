<?php

namespace App\Http\Transformers;

use App\Http\Transformers\TransformerAbstract;

class DBAddressTransformer extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'zip' => $data->zip,
            'city' => $data->city,
            'area' => $data->area,
            'road' => $data->road,
            'lane' => $data->lane,
            'alley' => $data->alley,
            'no' => $data->no,
            'floor' => $data->floor,
            'address' => $data->address,
            'filename' => $data->filename,
            'latitude' => $data->latitude,
            'lontitue' => $data->lontitue,
            'full_address' => $data->full_address
        ];
    }
}
