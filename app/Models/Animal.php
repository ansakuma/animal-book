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
}
