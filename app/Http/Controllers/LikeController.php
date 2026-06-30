<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;

// app/Http/Controllers/LikeController.php

class LikeController extends Controller
{
    public function toggleLike(Animal $animal)
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // モデル（Animal.php）に定義したトグル処理を呼び出す
        $status = $animal->toggleLike($user);

        // 結果をJSONで画面に返す
        return response()->json(['status' => $status]);
    }
}
