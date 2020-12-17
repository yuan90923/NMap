<?php

namespace App\Http\Utils;

class MessageTransform
{
    private static $instance = null;
    protected $http_code = [
        'OK' => '200',
        'INVALID_ARGUMENT' => '400',
        'FAILED_PRECONDITION' => '400',
        'OUT_OF_RANGE' => '400',
        'UNAUTHENTICATED' => '401',
        'PERMISSION_DENIED' => '403',
        'NOT_FOUND' => '404',
        'ABORTED' => '409',
        'ALREADY_EXISTS' => '409',
        'RESOURCE_EXHAUSTED' => '429',
        'CANCELLED' => '499',
        'DATA_LOSS' => '500',
        'UNKNOWN' => '500',
        'INTERNAL' => '500',
        'NOT_IMPLEMENTED' => '501',
        'UNAVAILABLE' => '503',
        'DEADLINE_EXCEEDED' => '504',
    ];

    private function __construct()
    {
        //
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __destruct()
    {
        self::$instance = null;
    }

    public function item($status, $data, $transform)
    {
        return $this->array($status, $transform->transform($data));
    }

    public function paginator($status, $data, $transform)
    {
        $transformData = [];
        $data = $data->toArray();

        foreach ($data['data'] as $k => $v) {
            $transformData[] = $transform->transform($v);
        }

        $details = [
            'data' => $transformData,
            'current_page' => $data['current_page'],
            'first_page_url' => $data['first_page_url'],
            'last_page' => $data['last_page'],
            'last_page_url' => $data['last_page_url'],
            'next_page_url' => $data['next_page_url'],
            'path' => $data['path'],
            'per_page' => $data['per_page'],
            'total' => $data['total']
        ];

        return $this->array($status, $details);
    }

    public function array(string $status, $details)
    {
        return [
            'code' => $this->http_code[$status],
            'status' => $status,
            'details' => $details,
            'replyTime' => date("Y-m-d H:i:s", strtotime('now'))
        ];
    }

    public function error(string $status, array $details)
    {
        return [
            'code' => $this->http_code[$status],
            'status' => $status,
            'details' => [
                'target' => $details['target'],
                'message' => $details['message']
            ],
            'replyTime' => date("Y-m-d H:i:s", strtotime('now'))
        ];
    }

    public function validatorError(string $status, $msgs)
    {
        $details = [];
        $msgs = collect($msgs)->toArray();

        foreach ($msgs as $k => $v) {
            $details[] = [
                'target' => $k,
                'message' => $v
            ];
        }

        return [
            'code' => $this->http_code[$status],
            'status' => $status,
            'details' => $details,
            'replyTime' => date("Y-m-d H:i:s", strtotime('now'))
        ];
    }
}
