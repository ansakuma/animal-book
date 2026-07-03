## みんなのアニマル図鑑について

自慢のペットやお気に入りの動物を自由に登録し、みんなで共有できるアニマル図鑑アプリケーションです。


## 開発の背景と工夫

「宮城のおじさん」のように親しみやすい「飼い主名」を自由に設定して愛着を持てる仕様にこだわりました。また、たくさんある写真を見ながら快適に「いいね」を押せるよう、JavaScript（Fetch API）による非同期通信を実装し、ユーザーがストレスなく楽しめる快適な操作性を追求しました。

最新順の並び替え機能: 新しく登録されたアニマルが一番上に表示されるよう、コントローラー側で `latest()` メソッドを使用し、データベースからの取得順を制御しました。

ログイン状態（`@auth`）とゲスト状態でヘッダーの表示（ユーザー名表示やログアウトボタン）が綺麗に切り替わるようにしています。

↓ログイン前のトップページ（ゲストモード）
<img width="1457" height="983" alt="image" src="https://github.com/user-attachments/assets/3c742736-5991-43aa-ad31-505296ef06db" />


↓ログイン後のトップページ（いいね機能）
<img width="1439" height="985" alt="image" src="https://github.com/user-attachments/assets/e7a3a4d3-3dbe-4a1b-8860-b54aec8753c8" />


↓アニマルの詳細ページ
<img width="362" height="615" alt="image" src="https://github.com/user-attachments/assets/e226d5d0-fb24-49e7-bb8f-4583edde7ce5" />



↓マイページ（自分が登録したアニマル一覧）
<img width="1440" height="961" alt="image" src="https://github.com/user-attachments/assets/11838cfc-3911-4c8e-9322-0ea84c901f30" />


↓マイページ（登録済みアニマルの編集）
<img width="993" height="829" alt="image" src="https://github.com/user-attachments/assets/735672bc-5364-411b-a489-658c147399d1" />


↓マイページ（新しいアニマルの登録）
<img width="1253" height="788" alt="image" src="https://github.com/user-attachments/assets/823b0544-18f6-4bf0-a34f-b8e0d25c982f" />







