<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model //Animalというデータ（animalsテーブル）を扱うための設定をするクラス
{
    protected $fillable = [ // データの追加・編集を許可する項目を指定
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
        if (!$user) { // ログインユーザーがいない場合はfalseを返す
            return false;
        }
        return $this->likes()->where('user_id', $user->id)->exists();
    }

   

    public function toggleLike($user) // いいねを追加・削除する関数
    {
        // すでにいいねしているか探す
        $like = $this->likes()->where('user_id', $user->id)->first();

        if ($like) { // すでにいいねしている場合は削除
            $like->delete();
            return 'unliked'; // コントローラーに「消したよ」と報告
        } else {
            $this->likes()->create([ // いいねを追加
                'user_id' => $user->id,
                'animal_id' => $this->id // アニマルのIDを保存
            ]);
            return 'liked';   // コントローラーに「作ったよ」と報告
        }
    }
}
