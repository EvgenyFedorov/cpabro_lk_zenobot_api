<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Accesses extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'user_id', 'role_id', 'privileges', 'created_at', 'updated_at', 'deleted_at'
//    ];
    public function update(array $attributes = [], array $options = [])
    {
        return parent::update($attributes, $options); // TODO: Change the autogenerated stub

    }
    public function getAccess($user_id = null){
        return DB::table('accesses')
            ->where([['user_id', $user_id]])
            ->limit(1)
            ->get();
    }

}
