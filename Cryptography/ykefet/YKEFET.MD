
how Made the Challenge

step 1:sudo nano surprise.txt  Insert this messge --> "ZmxhZ3t3MTFfeTB1X200cnJ5X20zX3BsNX0="

step 2:sudo zip --password BABY13 surprise.zip surprise.txt " the password is from rockyou.txt"
=====

challenge name:ይከፈት

Catagory:Cryptography

Level:easy

Point:50

Challenge Description:


Seble wengel recived surprise message from here boyfriend called Bezabh. the message wase password protected file, so cany you help here to crack the password protected file to see the message? 
===
Solution
===
step1: generet hash using zip2john from  surprise.zp file
#zip2john  surprise.zip >hash.txt
step2: cracking the file using hash.txt
sudo john --wordlist=/usr/share/wordlists/rockyou.txt hash.txt
step3: You will got the password then open it the file
step4: # cat surprise.txt "the message is base64 encodede file decrept it useing cyberchife or any other online tool 
step5:The base64 file is"ZmxhZ3t3MTFfeTB1X200cnJ5X20zX3BsNX0=" decrebted file is "flag{w11_y0u_m4rry_m3_pl5}"


