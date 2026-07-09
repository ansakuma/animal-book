<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $animal->name }}</title>
    <style>
        body {
            background-color: #fae5e3; 
            font-family: 'Zen Maru Gothic', sans-serif; /* 丸みのあるフォント */
            font-size: 16px;
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
            border-radius: 16px;
            padding: 8px;
            background-color: #ffffff;
            border: 4px dashed #ffb6b0; /* 点線（ダッシュ） */
        }

        .detail-button {
            display: inline-block;
            background-color: green;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .heart-button {
            background: none;
            border: none;
            font-size: 25px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h1>{{ $animal->name }}</h1>


            
<img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" width="250">

<p>種類：{{ $animal->breed }}</p>

<p>性格：{{ $animal->personality }}</p>

<p>特技：{{ $animal->skill }}</p>

<a href="/">一覧へ戻る</a>

</body>
</html>