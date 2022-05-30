# Symbol PHP Snipets
SymbolをPHPで扱うためのスニペット達。

# Usage
スニペット本体はsnipets.phpにあります。
sample.phpにサンプルがあります。

decryptMessageは、暗号化する際に指示された公開アカウントの秘密鍵、署名アカウントの公開鍵、暗号化されたペイロードが引数です。
現在、主にSSS_ExtensionのgetActiveAccountTokenによって生成されたトークンを複号するための機能です。

WordPressのプラグイン等に活用されることを期待しています。
