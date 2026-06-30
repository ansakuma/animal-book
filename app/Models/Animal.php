<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'owner_name',
        'image',
        'breed',
        'personality',
        'skill',
        'user_id',
    ];

   

    public function likes()
    {
        return $this->hasMany(Like::class);//1つのアニマルに複数のいいねが紐づく
    }

    // ログインユーザーがすでにいいねしているか確認する関数
    public function isLikedBy($user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->likes()->where('user_id', $user->id)->exists();
    }

   

    public function toggleLike($user)
    {
        // すでにいいねしているか探す
        $like = $this->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            return 'unliked'; // コントローラーに「消したよ」と報告
        } else {
            $this->likes()->create([
                'user_id' => $user->id,
                'animal_id' => $this->id
            ]);
            return 'liked';   // コントローラーに「作ったよ」と報告
        }
    }
}
