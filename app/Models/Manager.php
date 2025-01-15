<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "manager";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "userId",
        "pwd",
        "createTime"
    ];

    /**
     * 驗證管理者憑證
     *
     * @param string $userId
     * @param string $pwd
     * @return Manager|null
     */
    public function getManager($userId, $pwd)
    {
        $manager = self::where("userId", $userId)->first();

        // 驗證密碼
        if ($manager && password_verify($pwd, $manager->pwd)) {
            return $manager;
        }

        return null;
    }

    /**
     * 檢查帳號是否存在
     *
     * @param string $userId
     * @return Manager|null
     */
    public function checkManager($userId)
    {
        return self::where("userId", $userId)->first();
    }

    /**
     * 檢查帳號是否已被其他使用者使用
     *
     * @param string $userId
     * @param string $oldUserId
     * @return Manager|null
     */
    public function hasManager($userId, $oldUserId)
    {
        return self::where("userId", $userId)
                   ->where("userId", "<>", $oldUserId)
                   ->first();
    }
}
