<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use Validator;
use App\Http\Repository\AddressRepository;
use App\Http\Transformers\AddressTransformer;
use App\Http\Transformers\DBAddressTransformer;

class AddressController extends BaseController
{
    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    // google api 地址查詢
    public function getAddress(Request $request)
    {
        $datas = $request->all();

        $rules = [
            'address' => 'required|string|min:1|max:255',
        ];

        $validator = Validator::make($datas, $rules);

        if ($validator->fails()) {
            return response()->json($this->msg->validatorError('INVALID_ARGUMENT', $validator->errors()), 400);
        }

        $mapData = \GoogleMaps::load('geocoding')
                    ->setParam (['address' => $datas['address']])
                    ->get();

        return response()->json($this->msg->item('OK', json_decode($mapData, true)['results'], new AddressTransformer()), 200);
    }

    // db 地址查詢
    public function getAddressByDB(Request $request)
    {
        $datas = $request->all();

        $rules = [
            'address' => 'required|string|min:1|max:255',
        ];

        $validator = Validator::make($datas, $rules);

        if ($validator->fails()) {
            return response()->json($this->msg->validatorError('INVALID_ARGUMENT', $validator->errors()), 400);
        }

        $adderssData = $this->repository->getAddressData($datas['address']);

        if (!$adderssData) {
            $details = [
                'target' => 'AddressData',
                'message' => '查無資料'
            ];

            return response()->json($this->msg->error('NOT_FOUND', $details), 404);
        }

        return response()->json($this->msg->item('OK', $adderssData, new DBAddressTransformer()), 200);
    }
}
