<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    use HasFactory;

    protected $fillable = ['file_id', 'path'];

    public function file() {
        $this->belongsTo(File::class, 'file_id');
    }
}
