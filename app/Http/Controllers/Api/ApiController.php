<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Api\Response;
use App\Models\Bot\Jobs;

abstract class ApiController extends Controller
{

    public function jobs(){
        return new Jobs();
    }
    public function response(){
        return new Response();
    }

}
