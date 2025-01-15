<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intro_system extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "intro_system";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "subtitle",
        "picture",
        "content",
        "createTime"
    ];
}