<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>みんなのアニマル図鑑</title>
    <style>
        /* 💡 全画面の基本設定（どのページにいってもこの設定がベースになります） */
        body {
            margin: 0;         /* 画面の端に変な隙間（余白）ができないようにリセット */
            padding: 0;        /* 内側の余白もリセット */
            background-color: #fbf6ee; /* ページ全体の背景を優しい生成り色にする */
            font-family: 'Zen Maru Gothic', "Helvetica Neue", Arial, sans-serif; /* 全ページの文字を丸みのあるフォントにする */
            color: #5a4b41;    /* 全ページの文字色を優しいココアブラウンにする */
        }

        /* 💡 横幅いっぱいに広がるヘッダーの帯 */
        .global-header {
            width: 100%;       /* 画面の左端から右端まで100%広げる */
            background-color: rgb(255, 255, 255); /* ヘッダーの背景は真っ白 */
            border-bottom: 1px solid rgb(17, 52, 123); /* ヘッダーの下側に青い線を引く */
        }

        /* 💡 ヘッダーの中身を綺麗に横並びにするための枠 */
        .header-container {
            max-width: 1200px; /* 中身が広がりすぎないように最大幅を制限 */
            margin: 0 auto;    /* 画面幅が1200px以上のとき、この枠を真ん中に寄せる */
            height: 65px;      /* ヘッダーの高さを65ピクセルに固定 */
            padding: 0 20px;   /* 左右に少しだけクッション（余白）を入れる */
            display: flex;     /* 【重要】中身（ロゴとメニュー）を横並びにする魔法 */
            align-items: center; /* 横並びにした中身を、上下中央に揃える */
            justify-content: space-between; /* ロゴは左端、メニューは右端に引き離して配置する */
        }

        /* 💡 左側のロゴタイトル */
        .header-logo a {
            font-size: 22px;   /* 文字の大きさ */
            font-weight: bold; /* 文字を太字にする */
            color: #5a4b41;    /* ロゴの文字色（濃いグレー） */
            text-decoration: none; /* リンクの下線を消す */
        }

        /* 💡 右側のナビゲーションメニューの塊 */
        .header-nav {
            display: flex;     /* メニュー内のリンクやボタンを横並びにする */
            align-items: center; /* 上下中央に揃える */
            gap: 20px;         /* リンク同士の間に20ピクセルの隙間をあける */
        }
        .nav-link:hover {
            color: orange;    /* リンクの色を青にする */
            text-decoration: none; /* 下線を消す */
        }

        /* 💡 ナビゲーションのリンク（トップページ・マイページ） */
        .nav-link {
            font-size: 14px;
            font-weight: bold;
            color: #2563eb;    /* リンクの色を青にする */
            text-decoration: none; /* 下線を消す */
        }

        /* 💡 ユーザー名とメールアドレスの文字 */
        .user-info {
            font-size: 14px;
            color: #4b5563;    /* 少し薄いグレーにして目立ちすぎないようにする */
        }
        .user-info strong {
            color: #111827;    /* でんじろう などの名前の部分だけ濃い色にする */
        }

        /* 💡 赤いログアウトボタン */
        .logout-btn {
            background-color: #ef4444; /* ボタンの背景を赤にする */
            color: white;              /* 文字を白にする */
            font-weight: bold;         /* 文字を太字にする */
            font-size: 14px;
            padding: 8px 20px;         /* ボタンの内側に余白を作って立体感を出して太らせる（上下8px、左右20px） */
            border: none;              /* ボタン特有の黒い外枠線を消す */
            border-radius: 6px;        /* ボタンの角を丸くする */
            cursor: pointer;           /* マウスを乗せたときに「手（人差し指）」のマークにする */
        }
        /* 💡 ログアウトボタンにマウスを乗せたときの変化 */
        .logout-btn:hover {
            background-color: #dc2626; /* 少し濃い赤にして、押せることを分かりやすくする */
        }
    </style>
</head>
<body>

    <header class="global-header">
        <div class="header-container">
            <div class="header-logo">
                <a href="{{ route('index') }}">みんなのアニマル図鑑🐾</a>
            </div>
            <div class="header-nav">
                <a href="{{ route('index') }}" class="nav-link">トップページ</a>
                <a href="{{ route('animals.mypage') }}" class="nav-link">マイページ</a>
                
                @auth
                    {{-- 💡 ログインしている時だけ、名前を表示する --}}
                    <span class="user-info">ユーザー名: <strong>{{ Auth::user()->name }}</strong></span>
                    <span class="user-info">メール: <strong>{{ Auth::user()->email }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="logout-btn">ログアウト</button>
                    </form>
                @else
                    {{-- 💡 ログインしていない時は、「ゲスト」などと表示するか、ログインボタンを置く --}}
                    <span class="user-info">ゲストさん</span>
                    <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                    <a href="{{ route('register') }}" class="nav-link">ユーザー新規登録</a> 
                @endauth
               

                
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>