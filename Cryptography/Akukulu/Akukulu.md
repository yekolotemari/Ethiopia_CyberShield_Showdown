How made the challenge
the Akukulu-Message.txt have encripted message using atbash cipher 
#steghide embed -cf atbash.jpg -ef Akukulu-Message.txt 

======

Challenge Name:Back to አኩኩሉ

Catagory:Cryptography

Level:easy

Point:50

Challenge Description:

Newaychallenge elementery schoole  classmate student play Akukulu game occasionally at break time .You invited to the game  to  play with them  and  find the hiden flag.


Given image is here

====

solution


step 1: use stigehide to extract the message with no pass #steghide extract -sf  atbash.jpg
step 2: cat the Akukulu message file then you will find encrepted messgege so by looking the image name you will find the correct  cipher type. the cipher type is atbash
     then use cyberchief or any online toole 
step 3" the flag is flag{4tbash_1s_4wes0m3}
