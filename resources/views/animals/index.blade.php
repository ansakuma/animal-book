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

        /* 詳細ボタン（緑） */
        .detail-button {
            display: inline-block;
            background-color: green;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
        }
        /* 詳細ボタンにマウスを乗せたとき */
        .detail-button:hover {
            background-color: lightgreen;
        }

        /* いいねボタン */
        .heart-button {
            background: none;
            border: none;
            font-size: 25px;
            cursor: pointer;
        }
        .heart-button:active {
            transform: scale(1.2); /* クリックした瞬間に少し大きく */
        }
        /* いいねしていない時（黒いハート） */
        .heart-button.not-liked {
            color:rgb(127, 87, 61); /* ココアブラウン、または黒 */
        }

        /* いいねしている時（赤いハート） */
        .heart-button.liked {
            color: #e3342f; /* 赤色 */
        }
    </style>

    <div class="index-container">
        
        <h1 style="text-align: center;">🐱 みんなのアニマル図鑑 🐶</h1>

        <table>
            <tr>
                <th>名前</th>
                <th>写真</th>
                <th>種類</th>
                <th>詳細</th>
                <th>いいね</th>
            </tr>

            @foreach ($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
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
                <td>
                <button class="heart-button {{ $animal->isLikedBy(Auth::user()) ? 'liked' : 'not-liked' }}" data-animal-id="{{ $animal->id }}">❤</button>
                </td>
            </tr>
            @endforeach
        </table>

    </div>

    <script>
        // 画面の中にあるすべてのハートボタン（.heart-button）を見つけて、クリックイベントをつける
        document.querySelectorAll('.heart-button').forEach(button => {
            button.addEventListener('click', function() {
                const animalId = this.getAttribute('data-animal-id'); // クリックされたアニマルのIDを取得
                const heart = this;

                // LaravelのLikeControllerに「いいねして！」と裏側でリクエストを送る
                fetch(`/animals/${animalId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravelで通信するときに必須の暗号キー
                    }
                })
                .then(response => response.json()) // サーバーからの返事（json）を解析
                .then(data => {
                    if (data.status === 'liked') {
                        // 💡 「いいね登録」されたら：黒クラスを消して、赤クラスをつける
                        heart.classList.remove('not-liked');
                        heart.classList.add('liked');
                    } else if (data.status === 'unliked') {
                        // 💡 「いいね解除」されたら：赤クラスを消して、黒クラスをつける
                        heart.classList.remove('liked');
                        heart.classList.add('not-liked');
                    }
                })
                .catch(error => console.error('Error:', error)); // 万が一エラーが起きたらログに出す
            });
        });
    </script>
@endsection