<?php


namespace App\Http\Controllers\Api;

use App\Models\Bot\Jobs;
use Illuminate\Support\Facades\DB;

class ApiJobsController extends ApiController
{
    public function getAll(){

//        $response = $this->response()->Json();

        $jobs = $this->jobs()->getAll([['enable', 1]]);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            $job_edit->save();
        }

        DB::commit();

        return json_encode($job_ids);

    }
    public function getOnUserId($id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['user_id', $id]]);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            $job_edit->save();
        }

        DB::commit();

        return json_encode($job_ids);

    }
    public function getOnProgramId($id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['program_id', $id]]);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            $job_edit->save();
        }

        DB::commit();

        return json_encode($job_ids);

    }
    public function getOnUserAndProgramId($id, $program_id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['user_id', $id], ['program_id', $program_id]]);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            $job_edit->save();
        }

        DB::commit();

        return json_encode($job_ids);

    }
}
