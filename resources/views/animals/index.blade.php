@extends('layouts.app') {{-- 共通レイアウトを合体させる --}}

@section('content')
<style>
    /* 全体を中央に寄せるための枠 */
    .index-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* テーブル（表）の基本設定 */
    table {
        width: 100%;
        border-collapse: collapse;
        /* 線の重複をなくす */
    }

    /* マス目の余白と文字位置 */
    th,
    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ccc;
        /* 下線だけ引く */
    }

    /* 写真のサイズ */
    img {
        width: 200px;
        border-radius: 16px;
        padding: 8px;
        background-color: #ffffff;
        border: 4px dashed #ffb6b0;
        /* 点線（ダッシュ） */
    }

    /* 詳細ボタン（緑） */
    .detail-button {
        background-color: rgb(129, 188, 87);
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        border: none;
        /* 枠線をなしにする */
        text-decoration: none;
        transition: background-color 0.2s ease;
    }

    /* 詳細ボタンにマウスを乗せたとき */
    .detail-button:hover {
        background-color: green;
    }
</style>

<div class="index-container">

    <table>
        <tr>
            <th>アニマル名</th>
            <th>飼い主</th>
            <th>写真</th>
            <th>種類</th>
            <th>詳細</th>
        </tr>

        @foreach ($animals as $animal)
        <tr>
            <td>{{ $animal->name }}</td>
            <td>{{ $animal->owner_name ?? '名無しさん🐾' }}</td>
            <td>
                @if($animal->image)
                <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}">
                @else
                <span style="color: #ccc; font-size: 12px;">画像なし</span>
                @endif
            </td>
            <td>{{ $animal->breed }}</td>
            <td>
                <a href="{{ route('animals.show', $animal->id) }}" class="detail-button">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection