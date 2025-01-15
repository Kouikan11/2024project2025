<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_manage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "profile_manage";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "name",
        "nickName",
        "socialMedia",
        "smAddress",
        "email",
        "phoneNb",
        "address",
        "password",
    ];

    public function getLogin($address, $password)
    {
        $user = self::where("address", $address)->where("password", $password)->first();
        return $user;
    }

    public function checkLogin($address)
    {
        $user = self::where("address", $address)->first();
        return $user;
    }

    public function recruitments()
    {
        return $this->belongsToMany(recruitment::class,'managerecruit','profile_manage_id','recruitment_id');
    }

    public function checkUser($address)
    {
        $user=self::where("address",$address)->first();
        return $user;
    }

    public function hasUser($address,$oldAddress)
    {
        $user=self::where("address",$address)->where("address","<>",$oldAddress)->first();
        return $user;
    }
}