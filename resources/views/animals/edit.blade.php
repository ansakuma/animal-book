<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アニマル編集</title>
    <style>
        body {
            background-color:#fae5e3; 
            font-family: 'Zen Maru Gothic', sans-serif; /* 丸みのあるフォント */
            color: #5a4b41; /* 優しいココアブラウン */
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 16px;
        }

        

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        img {
            width: 200px;
            border-radius: 15px;
        }
        button{
         
            background-color: rgb(129, 188, 87);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;     /* 枠線をなしにする */
        }
        button:hover{
            background-color: green;
        }
        a[href="{{ route('animals.mypage') }}"]:hover {
            color: #d97736; /* 優しいオレンジ（お好みの色でOK） */
            text-decoration: underline;
        }
        
    </style>
</head>
<body>

<h1>🐾 アニマルの編集</h1>

<form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="name">アニマル名</label>
        <input type="text" name="name" id="name" value="{{ $animal->name }}">
    </div>
    <div class="form-group">
        <label for="owner_name">飼い主名</label>
        <input type="text" name="owner_name" id="owner_name" value="{{ $animal->owner_name }}" placeholder="例: 宮城のおじさん">
    </div>
    <div class="form-group">
        <label for="image">画像（変更する場合のみ選択）</label>
        <p style="margin: 5px 0;"><small>現在の画像：</small></p>
        <img src="{{ asset('storage/' . $animal->image) }}" width="100" style="border-radius: 5px; margin-bottom: 5px;">
        <input type="file" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="breed">種類</label>
        <input type="text" name="breed" id="breed" value="{{ $animal->breed }}">
    </div>

    <div class="form-group">
        <label for="personality">性格</label>
        <textarea name="personality" id="personality">{{ $animal->personality }}</textarea>
    </div>

    <div class="form-group">
        <label for="skill">特技</label>
        <textarea name="skill" id="skill">{{ $animal->skill }}</textarea>
    </div>

    <button type="submit">更新する🐾</button>
    <a href="{{ route('animals.mypage') }}" style="margin-left: 10px;">マイページに戻る</a>
</form>

</body>
</html>