# pen_world
ペンワールド片山の仮想サイト

## デプロイ(XSERVER)
```
ssh xserver
```
```
cd pen-world.net
```
```
sh setup.sh
```
setup.shの内容
```
#!/bin/bash
set -e

# 初期化
rm -rf public_html/* public_html/.[^\.]*
rm -rf cakephp/* cakephp/.[^\.]*
echo -e '完了: 初期化\n'

# 移動
cd public_html/

# clone
git clone https://github.com/NakamuraShun/pen_world.git
echo -e '完了: clone\n'

# logs/作成
mkdir pen_world/cakephp/app/logs/

# 構成変更
mv -n pen_world/cakephp/app/webroot/* pen_world/cakephp/app/webroot/.[^\.]* ./
mv -n pen_world/cakephp/app/* pen_world/cakephp/app/.[^\.]* ../cakephp/
echo -e '完了: 構成変更\n'

# 権限変更
chmod 777 -R ../cakephp/logs
echo -e '完了: 権限変更\n'

# 不要フォルダ除去
rm -rf pen_world/

echo -e '========== 本番の環境構築更完了しました ==========\n
```

## ローカル環境構築(中村用)
■cake起動
```
cakephp/app/bin/cake server
```

■MySQL
起動
```
mysql.server start
```
rootログイン
```
mysql -uroot
```
※app_local.php
```
'username' => 'root',
 'password' => '',
 'database' => 'pwk_db',
 ```


■gulp起動
```
cd gulp
```
```
npx gulp scss_watch
```

※マイグレーション
```
cakephp/app/bin/cake migrations migrate
```
