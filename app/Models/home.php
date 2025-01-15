<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "home";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "name",
        "email",
        "content",
        "createTime"
    ];
}
