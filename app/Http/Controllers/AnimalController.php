<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    // 一覧ページを表示する
    public function index()
    {
        $animals = Animal::latest()->get();
        return view('animals.index', compact('animals'));// animals/index.blade.php にデータを渡す
    }


    public function show($id)
    {
    $animal = Animal::findOrFail($id);
    return view('animals.show', compact('animal'));
    }

    // 登録画面を表示
    public function create()
    {
    return view('animals.create');
    }

    // 登録処理
    public function store(Request $request)
    {  

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255', 
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'breed' => 'nullable|string|max:255',
            'personality' => 'nullable|string',
            'skill' => 'nullable|string',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public');
        }


        

        Animal::create([
            'name' => $validated['name'],
            'owner_name' => $validated['owner_name'] ?? null, // 画面からの入力を保存します
            'image' => $imagePath,
            'image' => $imagePath,
            'breed' => $validated['breed'] ?? null,
            'personality' => $validated['personality'] ?? null,
            'skill' => $validated['skill'] ?? null,
            'user_id' =>Auth::id(), // ログインauth()->id()
        ]);

        return redirect()->route('animals.mypage')->with('success', 'アニマルを追加しました🐾');
    }
// 💡 マイページ（自分が登録したアニマル一覧）
    public function mypage()
    {
        
        $animals = Animal::where('user_id', Auth::id())->latest()->get();
        
        return view('animals.mypage', compact('animals'));
    }

    // 💡 編集画面を表示する
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.edit', compact('animal'));
    }

    // 💡 編集内容をデータベースに保存（更新）する
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'breed' => 'nullable|string|max:255',
            'personality' => 'nullable|string',
            'skill' => 'nullable|string',
        ]);

        // 画像が新しくアップロードされた場合だけ書き換える
        if ($request->hasFile('image')) {
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        // その他の項目を更新
        $animal->name = $validated['name'];
        $animal->owner_name = $validated['owner_name'] ?? null;
        $animal->breed = $validated['breed'] ?? null;
        $animal->personality = $validated['personality'] ?? null;
        $animal->skill = $validated['skill'] ?? null;
        $animal->save(); // データベースに保存

        return redirect()->route('animals.mypage')->with('success', '更新しました🐾');
    }

    // 💡 データを削除する処理
    public function destroy($id)
    {
        // 指定されたIDのアニマルを見つける
        $animal = Animal::findOrFail($id);
        
        // データベースから削除する
        $animal->delete();

        // マイページに戻り、メッセージを表示
        return redirect()->route('animals.mypage')->with('success', '削除しました🐾');
    }
}