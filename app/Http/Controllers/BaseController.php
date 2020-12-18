<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Utils\MessageTransform;
use App\Http\Utils\CollectionHelper;

class BaseController extends Controller
{
    protected $msg;
    protected $collection;

    public function __construct()
    {
        $this->msg = MessageTransform::getInstance();
        $this->collection = CollectionHelper::getInstance();
    }
}
