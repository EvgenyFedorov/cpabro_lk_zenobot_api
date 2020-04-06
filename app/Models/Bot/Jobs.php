<?php

namespace App\Models\Bot;

use App\Models\User;
use App\Models\Users\Programs;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{

    public function getAll($where, $limit){
        return DB::table('jobs')
            ->where($where)
            ->limit($limit)
            ->get();
    }
    public function programs(){
        return $this->hasOne(Programs::class, 'program_id', 'id');
    }
    public function users(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
