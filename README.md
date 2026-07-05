## みんなのアニマル図鑑について

自慢のペットやお気に入りの動物を自由に登録し、みんなで共有できるアニマル図鑑アプリケーションです。


## 開発の背景と工夫

「宮城のおじさん」のように親しみやすい「飼い主名」を自由に設定して愛着を持てる仕様にこだわりました。また、たくさんある写真を見ながら快適に「いいね」を押せるよう、JavaScript（Fetch API）による非同期通信を実装し、ユーザーがストレスなく楽しめる快適な操作性を追求しました。

最新順の並び替え機能: 新しく登録されたアニマルが一番上に表示されるよう、コントローラー側で `latest()` メソッドを使用し、データベースからの取得順を制御しました。

ログイン状態（`@auth`）とゲスト状態でヘッダーの表示（ユーザー名表示やログアウトボタン）が綺麗に切り替わるようにしています。


↓ログイン前のトップページ（ゲストモード）
<img width="1604" height="950" alt="image" src="https://github.com/user-attachments/assets/aa208821-46dc-47c9-a0d4-8a875f959dfa" />


↓ログイン後のトップページ（いいね機能）
<img width="1641" height="964" alt="image" src="https://github.com/user-attachments/assets/3660f7f0-c175-4fbd-b46d-3e7f27ba1dd0" />

↓詳細ページ
<img width="1660" height="857" alt="image" src="https://github.com/user-attachments/assets/aa979a27-c668-4af0-bbc9-1022a3c3c3d1" />


↓マイページ（自分が登録したアニマル一覧）
<img width="1648" height="977" alt="image" src="https://github.com/user-attachments/assets/584b20e5-fc05-4154-beab-110b9f51f36c" />


↓登録済みアニマルの編集ページ
<img width="1649" height="964" alt="image" src="https://github.com/user-attachments/assets/dcad9b33-bc9e-4038-b9d8-1fc87415f6d8" />


↓新しいアニマルの登録ページ
<img width="1654" height="926" alt="image" src="https://github.com/user-attachments/assets/c68af9f4-2bd8-497d-9d9f-238e5406d62c" />






