<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }
    public function isLikedBy($user,$user_liked_id): bool
    {
        return Like::where('user_id', $user->id)->where('user_liked_id', $user_liked_id->id)->first() !== null;
    }
    public function user_liked_id()
    {
        return $this->belongsTo(User::class);
    }
}
