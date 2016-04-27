#
'''

make_a_warning_sound.pyは警告音の再生および設定行うプログラムである．
make_a_warning_sound クラスで警告音の再生および設定行っている．

本プログラム単体で処理を開始するには音量(0～1:0.1刻み)と再生時間(秒)を以下のように与える必要がある．

[本プログラム単体の起動例: $sudo python make_a_warning_sound.py 0.5 5]

'''

#coding:utf-8
import pygame.mixer
import time

class make_a_warning_sound():

    def __init__(self,playvol,playtime):
        self.playvol = playvol
        self.playtime = playtime
        #print "ok"
        #print self.vol

    def make_a_warning_sound(self):
        pygame.mixer.init()
        pygame.mixer.music.load('warning_sound.wav') #警告用サウンド読み込み
        pygame.mixer.music.play(1) #再生回数(1)
        pygame.mixer.music.set_volume(self.playvol) #ボリューム設定
        time.sleep(self.playtime) #再生時間(s)
        pygame.mixer.music.stop() #再生を停止

#単体テスト用
if __name__==('__main__'):
    import pygame.mixer
    import time
    import sys

    pram = sys.argv
    argv = sys.argv  # コマンドライン引数を格納したリストの取得
    arglen = len(argv) # 引数の個数
    # デバッグプリント
#    print argv
#    print arglen

    if (arglen != 3):   # 引数が足りない場合は, その旨を表示
        print 'エラー%:引数が適切ではありません' % argv[0]
        print '音量(0～1:0.1刻み)，録音時間(秒)を引数にいれてください
        quit()         # プログラムの終了

    playvol=int(argv[1])
    playtime = int(argv[2])
    mws = make_a_warning_sound(playvol, playtime) #音量(0～1:0.1刻み)/再生時間(秒)の設定

    mws.make_a_warning_sound()

