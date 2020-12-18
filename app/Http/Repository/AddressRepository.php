<?php

namespace App\Http\Repository;

use App\Http\Repository\BaseRepository;

use App\Models\Address;

class AddressRepository extends BaseRepository
{
    public function getAddressData($address)
    {
        try {
            $data = Address::where('full_address', $address)
                            ->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return false;
        }

        return $data;
    }
}
