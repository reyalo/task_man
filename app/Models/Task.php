<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id','status','submit_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // // it shows current user tasks
    protected static function booted()
    {
        static::addGlobalScope('user', function(Builder $builder){
            $builder->where('user_id', Auth::id());
        });
    }
}
