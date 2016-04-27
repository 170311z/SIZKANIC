#
'''
receive_warning_instruction.pyは騒音情報の送受信を行うプログラムである．
receive_warning_instruction クラスでは，create_noise_data クラスで作成された騒音情報にデバイスID，エリアIDを加えたパラメータを作成する．
そのパラメータをサーバー上のWebAPI.phpのURLに加えサーバーにリクエストを送信する．
レスポンスはサーバーから「yes」もしくは「no」を受信する．
「yes」の場合は警告音が再生され，「no」の場合は再生されない．

本プログラムはmain.pyを起動することで処理を開始する．
本プログラム単体で処理を開始するには，以下のようにする．

本プログラム単体の起動例: $sudo python receive_warning_instruction.py

なお単体テストを行う場合，本プログラムの70行目の引数を変更することによりデシベル値・年/月/日・時刻・警告音の音量・警告音の再生時間の設定を変更可能である．

'''

# coding:utf-8
import make_a_warning_sound
import urllib
import urllib2

class receive_warning_instruction():



    def __init__(self,avg_dB,date,time,vol,playtime):
	self.a = avg_dB	   #デシベル値
	self.d = date      #年/月/日
 	self.t = time      #時刻
	self.RPID = 101    #デバイスID
	self.AreaID = "1f" #エリアID

        #警告音再生インスタンス生成
        #()内はボリューム，再生時間
        self.mws = make_a_warning_sound.make_a_warning_sound(vol,playtime)

    def receive_warning_instruction(self):

	#URL
	url = 'http://54.238.209.80/WebAPI/WebAPI.php'

	#parames_encode
	params = {'dev_id' : self.RPID,'day':self.d,'level':self.a, 'time':self.t, 'area_id':self.AreaID}
	params = urllib.urlencode(params)

	#URL_parames_bond
	URL = url + '?' + params

	print URL

	#server_reqest
	response = urllib2.urlopen(URL)

	#server_response
	content = response.read()
	print(content)

        if '"go"' in content:
            print "Yes"
            self.mws.make_a_warning_sound()
        else:
            print "no"


#単体テスト用
if __name__ == '__main__':
    import make_a_warning_sound
    rwi = receive_warning_instruction(10,"2015/12/25",1800,0.8,3)#デシベル値・年/月/日・時刻・警告音の音量・警告音の再生時間
    rwi.receive_warning_instruction()

