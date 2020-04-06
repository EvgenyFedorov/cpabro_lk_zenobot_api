<?php


namespace App\Http\Controllers;


use App\Models\Bot\Jobs;

class IndexController extends Controller
{

    public function index(){

        $jobs = $this->jobs()->getAll([['id', '>', 0]], 1000);

//        dd($jobs);

        return view('home', [
            'jobs' => $jobs
        ]);

    }

    public function Jobs(){
        return new Jobs();
    }

}
