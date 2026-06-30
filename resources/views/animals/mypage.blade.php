@extends('layouts.app') {{-- 共通レイアウトを合体させる --}}

@section('content')
    <style>
        /* テーブルを中央に寄せるための外枠 */
        .mypage-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* 登録ボタンのまとまり */
        .create-button-box {
            margin-bottom: 20px;
        }

        /* 新しいアニマルを登録するボタン */
        .create-button {
            display: inline-block;
            background-color: #c07949; /* ブラウン */
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 6px; 
        }

        /* テーブル（表）の基本設定 */
        table {
            width: 100%;
            border-collapse: collapse; /* 線の重複をなくす */
        }

        /* マス目の余白と文字位置 */
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc; /* 下線だけ引く */
        }

        /* 写真のサイズ */
        img {
            width: 200px;
        }

        /* 編集ボタン（緑） */
        .edit-button {
            display: inline-block;
            font-size: 16px;
            background-color: green;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 6px; 
        }

        /* 削除ボタン（赤） */
        .delete-button {
            background-color: #e3342f;
            font-size: 16px;
            color: white;
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            border-radius: 6px; 
        }
    </style>

    <div class="mypage-container">
        
        <h1>マイページ（自分が登録したアニマル）</h1>

        {{-- 成功メッセージ --}}
        @if (session('success'))
            <div style="background-color: #e6f4ea; color: #137333; padding: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
   
        {{-- 新規登録ボタン --}}
        <div class="create-button-box">
            <a href="{{ route('animals.create')}}" class="create-button">新しいアニマルを登録する⭐️</a>
        </div>

        {{-- アニマル一覧 --}}
        <table>
            <tr>
                <th>アニマル名</th>
                <th>飼い主</th>
                <th>写真</th>
                <th>種類</th>
                <th>操作</th>
            </tr>

            @foreach ($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->owner_name ?? '名無しさん🐾' }}</td>
                <td>
                    <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}">
                </td>
                <td>{{ $animal->breed }}</td>
                <td>
                    <a href="{{ route('animals.edit', $animal->id) }}" class="edit-button">編集</a>
                    
                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection