@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>ID PROGRAM</th>
                            <th>ID USER</th>
                            <th>CODE</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <th class="id">{{$job->id}}</th>
                                <th class="program_id">{{$job->program_id}}</th>
                                <th class="user_id">{{$job->user_id}}</th>
                                <th class="code_id">{{$job->code_id . rand(11111,23344)}}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
