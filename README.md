## みんなのアニマル図鑑について

自慢のペットやお気に入りの動物を自由に登録し、みんなで共有できるアニマル図鑑アプリケーションです。投稿した動物に「いいね」を付けたり、自分の投稿を管理したりすることができます。


## 開発の背景と工夫

JavaScriptのFetch関数を使用し、「いいね」機能をページ遷移なしで実装しました。写真を見ながら快適に操作できるよう、ユーザーの使いやすさを意識しています。

バリデーションを実装し、必須項目や画像形式をチェックすることで、正しいデータのみ登録できるようにしました。

ログイン状態（`@auth`）とゲスト状態でヘッダーの表示（ユーザー名表示やログアウトボタン）が綺麗に切り替わるようにしています。

マイページではログインユーザー自身の投稿のみを表示し、他ユーザーの投稿と区別できるようにしています。


↓ログイン前のトップページ（ゲストモード）
<img width="1527" height="942" alt="image" src="https://github.com/user-attachments/assets/d6fa39be-78c4-4faf-911e-b8f3c5ccc179" />


↓ログイン後のトップページ（いいね機能）
<img width="1508" height="938" alt="image" src="https://github.com/user-attachments/assets/c553abb3-1a1f-4f0e-bd10-1b19cb3bdb23" />

↓詳細ページ
<img width="1212" height="723" alt="image" src="https://github.com/user-attachments/assets/6a179cf1-c657-4430-bc87-aa421db46446" />

↓マイページ（自分が登録したアニマル一覧）
<img width="1485" height="951" alt="image" src="https://github.com/user-attachments/assets/749ab2db-ca85-4c8d-ade3-ddf2e7c3c57b" />


↓登録済みアニマルの編集ページ
<img width="1446" height="819" alt="image" src="https://github.com/user-attachments/assets/1a3377d1-8079-4b9e-be6e-785b553a7903" />


↓アニマル登録ページ
<img width="1250" height="708" alt="image" src="https://github.com/user-attachments/assets/915c4f2b-ede0-49c2-8dab-90db5e240e43" />


↓アニマル登録ポップアップ
<img width="1533" height="948" alt="image" src="https://github.com/user-attachments/assets/69d3aeba-228e-4d67-902e-a2eaa499cc2e" />







