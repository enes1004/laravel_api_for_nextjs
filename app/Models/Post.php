<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with=["author"];

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function content_group(){
        return $this->belongsTo(ContentGroup::class);
    }

}
