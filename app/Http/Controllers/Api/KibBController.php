<?php

namespace App\Http\Controllers\Api;

use App\Models\KibB;
use App\Http\Resources\KibBResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KibBController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all Kib B
        $kibB = KibB::all();

        //return collection of posts as a resource
        return new KibBResource(true, 'List Data KiB', $kibB);
    }
}
