<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "managerecruit";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "recruitment_id",
        "profile_manage_id"
    ];

    public function recruitments()
    {
        return $this->belongsTo(recruitment::class, 'recruitment_id');
    }

    public function users()
    {
        return $this->belongsTo(profile_manage::class, 'profile_manage_id');
    }
}