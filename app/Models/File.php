<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'owner', 'translate_path'];

    public function getOwner()
    {
        return $this->belongsTo('User');
    }

    public function allUsers() {
        return $this->belongsToMany('User');
    }

}
