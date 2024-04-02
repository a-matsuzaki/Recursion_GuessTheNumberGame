<?php
// random_int関数を使用して乱数を生成する

// ユーザーに最小値と最大値を入力してもらう
fwrite(STDOUT, "最小数を入力してください: ");
$n = trim(fgets(STDIN));
fwrite(STDOUT, "最大数を入力してください: ");
$m = trim(fgets(STDIN));

// 最小値が最大値以下であることを確認する
while ($n > $m) {
    fwrite(STDOUT, "最小数は最大数以下でなければなりません。もう一度入力してください。\n");
    fwrite(STDOUT, "最小数を入力してください: ");
    $n = trim(fgets(STDIN));
    fwrite(STDOUT, "最大数を入力してください: ");
    $m = trim(fgets(STDIN));
}

// $n から $m の範囲内で乱数を生成
$secret_number = random_int((int)$n, (int)$m);

// 推測の試行回数
$tries = 0;
$max_tries = 5;  // 最大試行回数を設定

// ユーザーが数字を推測する
while ($tries < $max_tries) {
    fwrite(STDOUT, "{$n} から {$m} の間の数を推測してください: ");
    $guess = trim(fgets(STDIN));
    $tries++;  // 試行回数を1増やす

    // 推測が正しいかチェックする
    if ($guess == $secret_number) {
        fwrite(STDOUT, "おめでとう！正解です。{$tries} 回で当てました。\n");
        break;  // 正解したのでループを抜ける
    } elseif ($guess < $secret_number) {
        fwrite(STDOUT, "もっと大きい数です。\n");
    } else {
        fwrite(STDOUT, "もっと小さい数です。\n");
    }

    // 最大試行回数に達したかチェックする
    if ($tries == $max_tries) {
        fwrite(STDOUT, "残念！試行回数の上限に達しました。正解は {$secret_number} でした。\n");
        break;
    }
}
