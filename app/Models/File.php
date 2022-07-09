<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'path', 'size', 'translated'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function translate() {
        return $this->hasOne(Translate::class)->latest();
    }

}
