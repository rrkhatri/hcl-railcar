<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\OptionResource;
use App\Models\Railcar;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index($type)
    {
        if (method_exists($this, $type)) {
            return OptionResource::collection($this->{$type}());
        }
    }

    public function area()
    {
        return collect(Railcar::areas())->map(function ($key) {
            return (object) [
                'key' => $key,
                'value' => __($key)
            ];
        })->values();
    }

    public function status()
    {
        return collect(Railcar::statuses())->map(function ( $key) {
            return (object) [
                'key' => $key,
                'value' => __($key)
            ];
        })->values();
    }
}
