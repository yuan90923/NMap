<?php

namespace App\Http\Utils;

class CollectionHelper
{
    private static $instance = null;

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

    public function collect(array $arr)
    {
        return collect($arr);
    }

    public function keys(array $arr)
    {
        return collect($arr)->keys()->all();
    }

    public function diff(array $arr, array $diffArr)
    {
        $collection = collect($arr);
        $collection = $collection->diff($diffArr);

        return $collection->all();
    }

    public function except(array $arr, array $exceptArr)
    {
        $collection = collect($arr);
        $collection = $collection->except($exceptArr);

        return $collection->all();
    }

    public function only(array $arr, array $exceptArr)
    {
        $collection = collect($arr);
        $collection = $collection->only($exceptArr);

        return $collection->all();
    }
}
