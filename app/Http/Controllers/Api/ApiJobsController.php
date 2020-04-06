<?php


namespace App\Http\Controllers\Api;

use App\Models\Api\Logs;
use App\Models\Bot\Jobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiJobsController extends ApiController
{
    public function getAll(){

//        $response = $this->response()->Json();

        $jobs = $this->jobs()->getAll([['enable', 1], ['status', 0]], 1);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            //$job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            //$job_edit->save();
        }

        DB::commit();

        return json_encode($jobs);

    }
    public function getOnUserId($id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['status', 0], ['user_id', $id]], 1);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            //$job_edit->save();
        }

        DB::commit();

        return json_encode($jobs);

    }
    public function getOnProgramId($id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['status', 0], ['program_id', $id]], 1);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            //$job_edit->save();
        }

        DB::commit();

        return json_encode($jobs);

    }
    public function getOnUserAndProgramId($id, $program_id){

        $jobs = $this->jobs()->getAll([['enable', 1], ['status', 0], ['user_id', $id], ['program_id', $program_id]], 1);
        $job_ids = [];

        DB::beginTransaction();

        foreach ($jobs as $job){
            $job_ids[] = $job->code_id;

            $job_edit = Jobs::find($job->id);
            $job_edit->status = 1;
            //$job_edit->save();
        }

        DB::commit();

        return json_encode($jobs);

    }
    public function hookSuccess(Request $request, $id){

        $jobs = $this->jobs()->getAll([['id', $id], ['enable', 1], ['status', 0]], 1);

        if($jobs){

            $job_edit = Jobs::find($jobs[0]->id);
            $job_edit->status = 1;
            $job_edit->save();

        }

        $response = [
            'id' => $jobs[0]->id,
            'status' => 'success'
        ];

        return json_encode($response);

    }
    public function hookFail(Request $request, $id){

        $job_edit = Jobs::find($id);
        $input = $request->input();

        if($job_edit){

            $job_edit->status = 2;
            $job_edit->save();

            $log = new Logs();
            $log->job_id = $jobs[0]->id;
            $log->description = $input['description'];
            $log->created_at = date("U") + (3600 * 3);
            $log->save();

        }

        $response = [
            'id' => $jobs[0]->id,
            'status' => 'fail'
        ];

        return json_encode($response);

    }

}
