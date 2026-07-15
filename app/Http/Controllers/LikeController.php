<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function toggleLike(Animal $animal)//URLに含まれている 5 という数字を見たLaravelが、自動的に「データベースの animals テーブルから、IDが 5 のアニマルデータ」を検索して、すでに中身が入った状態の $animal としてここに届けてくれふ
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // モデル（Animal.php）に定義したトグル処理を呼び出す
        $status = $animal->toggleLike($user);

        // 結果をJSONで画面に返す
        return response()->json(['status' => $status]);
    }
}
