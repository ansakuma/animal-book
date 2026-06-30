<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アニマル登録</title>
    <style>
        body {
            background-color: #fbf6ee; /* 優しい生成り色 */
            font-family: 'Zen Maru Gothic', sans-serif; /* 丸みのあるフォント */
            color: #5a4b41; /* 優しいココアブラウン */
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        button {
            display: inline-block;
            background-color: green;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: lightgreen;
        }

        input {
             /* 👇 1つ目の数字（12pxや15px）を大きくすると、上下の row（高さ）が広がります */
             padding: 12px 15px; 
            
            /* 横幅をいっぱいまで広げて押しやすくする */
            width: 100%; 
            box-sizing: border-box; /* paddingを増やしても横幅がハミ出さないようにするお守り */
            
            /* その他のお好みデザイン（角丸など） */
            border: 2px solid #ccc;
            border-radius: 10px; 
            font-size: 16px; /* 文字を少し大きくするとさらに見やすくなります */

        }
        textarea {
            /* 👇 1つ目の数字（12pxや15px）を大きくすると、上下の row（高さ）が広がります */
            padding: 12px 15px; 
            
            /* 横幅をいっぱいまで広げて押しやすくする */
            width: 100%; 
            box-sizing: border-box; /* paddingを増やしても横幅がハミ出さないようにするお守り */
            
            /* その他のお好みデザイン（角丸など） */
            border: 2px solid #ccc;
            border-radius: 10px; 
            font-size: 16px; /* 文字を少し大きくするとさらに見やすくなります */
        }

    </style>
</head>
<body>

<h1>アニマル登録</h1>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="name">名前</label>
        <input type="text" name="name" id="name" placeholder="例: とと">
    </div>

    <div class="form-group">
        <label for="image">画像ファイル名</label>
        <input type="file" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="breed">種類</label>
        <input type="text" name="breed" id="breed" placeholder="例: とら猫">
    </div>

    <div class="form-group">
        <label for="personality">性格</label>
        <textarea name="personality" id="personality" placeholder="例: 甘えん坊"></textarea>
    </div>

    <div class="form-group">
        <label for="skill">特技</label>
        <textarea name="skill" id="skill" placeholder="例: 食べ物の横取り"></textarea>
    </div>

    <button type="submit">
        登録する🐾
    </button>
    <a href="{{ route('animals.mypage') }}" style="margin-left: 10px;">マイページに戻る</a>

</form>
</body>
</html>
