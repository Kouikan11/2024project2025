<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "recruitment";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "address",
        "nickName",
        "system",
        "module",
        "nuOfMember",
        "level",
        "dateTime",
        "timeSlot",
        "content",
        "gm",
        "process",
        "countPlayer",
        "remainingNo",
        "result",
        "createTime"
    ];

    public function users()
    {
        return $this->belongsToMany(profile_manage::class,'managerecruit','recruitment_id', 'profile_manage_id');
    }
}