#
'''
main.pyは音の取得および警告に関する処理を行うプログラムである．
create_noise_data.py，make_a_warning_sound.py，receive_warning_instruction.pyのそれぞれのクラスを呼び出すことで処理を行う．
本プログラム単体で処理を開始するには，以下のように録音時間(秒)，警告音の音量(0～1:0.1刻みで変更可能)，警告音の再生時間(秒)を引数として与える必要がある．

[本プログラム単体の起動例: $sudo python main.py 60 0.5 3]

本プログラムは無限ループで処理し続けるため，処理を終了するには [Ctrl]+Z でプログラムを終了する．

'''

#coding:utf-8
class main():
    
    def __init__(self,rcdsec,playvol,playtime,x):
       
        self.rcdsec = rcdsec     #録音時間(秒)
        self.playvol = playvol   #音量(0～1:0.1刻み)
        self.playtime = playtime #警告音の再生時間
	#self.x = x

    def main(self):

        #for var in range(0,self.x):

	 while 1:

            #騒音情報作成インスタンス生成
            cnd = create_noise_data.create_noise_data(self.rcdsec) #()内は録音時間(s)
            cnd.create_noise_data() #騒音情報作成メソッド

            #騒音情報送信インスタンス生成
            #()内は平均dB，算出日，時刻，警告要サウンドのボリューム，再生時間
            rwi = receive_warning_instruction.receive_warning_instruction(cnd.avg_dB,cnd.date,cnd.time,self.playvol,self.playtime)
            rwi.receive_warning_instruction() #警告命令受信メソッド

if __name__ == '__main__':
    import create_noise_data
    import receive_warning_instruction
    import sys

    prms = sys.argv
    argv = sys.argv
    arglen = len(argv)

    if (arglen != 5):
        print 'エラー%:引数が適切ではありません' % argv[0]
        print '録音時間(秒)，警告音の音量(0～1:0.1刻みで変更可能)，警告音の再生時間(秒)の順番で引数をいれてください'
        quit()         # プログラムの終了

    rcdsec = int(argv[1])
    playvol = float(argv[2])
    playtime = int(argv[3])
    x = int(argv[4]) #ループ回数の引数
    mn = main(rcdsec,playvol,playtime,x)
    mn.main()
