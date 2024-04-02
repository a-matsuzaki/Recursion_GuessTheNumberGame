# randomモジュールをインポートして、乱数を生成できるようにする
import random

# ユーザーに最小値と最大値を入力してもらう
n = int(input("最小数を入力してください: "))
m = int(input("最大数を入力してください: "))

# 最小値が最大値以下であることを確認する
while n > m:
    print("最小数は最大数以下でなければなりません。もう一度入力してください。")
    n = int(input("最小数を入力してください: "))
    m = int(input("最大数を入力してください: "))

# n から m の範囲内で乱数を生成
secret_number = random.randint(n, m)

# 推測の試行回数
tries = 0
max_tries = 5  # 最大試行回数を設定

# ユーザーが数字を推測する
while tries < max_tries:
    guess = int(input(f"{n} から {m} の間の数を推測してください: "))
    tries += 1  # 試行回数を1増やす
    
    # 推測が正しいかチェックする
    if guess == secret_number:
        print(f"おめでとう！正解です。{tries} 回で当てました。")
        break  # 正解したのでループを抜ける
    elif guess < secret_number:
        print("もっと大きい数です。")
    else:
        print("もっと小さい数です。")
    
    # 最大試行回数に達したかチェックする
    if tries == max_tries:
        print(f"残念！試行回数の上限に達しました。正解は {secret_number} でした。")
        break
