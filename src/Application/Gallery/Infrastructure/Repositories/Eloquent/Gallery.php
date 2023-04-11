<?php

namespace Src\Application\Gallery\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table ='galleries';

    protected  $fillable =[
        'name',
        'description',
        'user_id'
    ];
}
