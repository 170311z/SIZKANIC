#
'''
create_noise_data.pyは騒音情報の作成を行うプログラムである．
class create_noise_data クラスで1分間マイク周辺の音を録音する．
録音した音声からの音圧データだけを取り出し，その音圧データの平均値を求める．
続いて，求めた平均音圧の絶対値を計算し，その値をdB 値に変換することで，1 分間の平均dB 値を算出する.

本プログラムはmain.pyを起動することで処理を開始する．
本プログラム単体で処理を開始するには，以下のように録音時間(秒)を引数として与える必要がある．

[本プログラム単体の起動例: $sudo python create_noise_data.py 60]

'''

# coding: utf-8
import datetime
import pyaudio
import sys
import time
import numpy
from scipy import int16
import math

class create_noise_data():

    def __init__(self,rcdsec):
        self.rcdsec = rcdsec
        self.avg_dB = 0
        self.date = 0
        self.time = 0

    def create_noise_data(self):
        #マイクで1分間録音
        chunk = 8192
        FORMAT = pyaudio.paInt16
        CHANNELS = 2
        #サンプリング周波数
        RATE = 16000
        #録音時間(s)
        RECORD_SECONDS = self.rcdsec

        #pyaudioのインスタンス生成
        p = pyaudio.PyAudio()

        #マイク0番
        input_device_index = 0
        #マイクからデータ取得
        stream = p.open(format = FORMAT,
                    channels = CHANNELS,
                    rate = RATE,
                    input = True,
                    frames_per_buffer = chunk)
        all = []
        for i in range(0, RATE / chunk * RECORD_SECONDS):
            data = stream.read(chunk)
            all.append(data)

        stream.close()

        #結合
        data = ''.join(all)

        #バイナリ型から数値型に
        w_num_data = numpy.frombuffer(data, dtype = int16)

        #各数値の絶対値をとる
        w_num_data = map(abs, w_num_data)

        #音圧の平均値を求める
        avg_vol = float(sum(w_num_data))/float(len(w_num_data))
        avg_vol = math.fabs(avg_vol)

        #デシベルに変換
        self.avg_dB = 20*math.log10(avg_vol/1)
	self.avg_dB = int(self.avg_dB)

        #現在日付・時刻のdatetime型データの変数を取得
        d = datetime.datetime.today()
        #strftime()メソッドで日付時刻の書式を指定して出力
        self.date = d.strftime("%Y%m%d") #年/月/日
        self.time = d.strftime("%H%M") #時刻

    	#テスト用
    	print self.avg_dB
    	print self.date
    	print self.time

        #pyaudioを閉じる
        p.terminate()


if __name__=='__main__':
    import datetime
    import pyaudio
    import sys
    import time
    import numpy
    from scipy import fromstring, int16
    from math import *
    pram = sys.argv
    argv = sys.argv  # コマンドライン引数を格納したリストの取得
    arglen = len(argv) # 引数の個数
    # デバッグプリント
#    print argv
#    print arglen

    if (arglen != 2):   # 引数が足りない場合は, その旨を表示
        print 'エラー%:引数が適切ではありません' % argv[0]
        print '録音時間(秒)を引数にいれてください
        quit()         # プログラムの終了

    rcdsec = int(argv[1]) #整数型にキャスト
    cnd = create_noise_data(rcdsec)
    cnd.create_noise_data()







