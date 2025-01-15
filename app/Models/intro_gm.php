<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intro_gm extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "intro_gm";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "picture",
        "content",
        "gm_system",
        "createTime"
    ];
}