How made the Challenge
step 1: encrept the password using "https://encrypt-online.com/tools/generate-sha256"
step 2: hash genereted :  ef92b778bafe771e89245b89ecbēc08a44a4e166c06659911881f383d4473e9H4f
step3: tre hash added some extra character out of  hexdesmal value ē and H  : ef92b778bafe771e89245b89ecbēc08a44a4e166c06659911881f383d4473e9H4f

====
Challenge Name:ጥሬ hash

Catagory:Cryptography

Level:easy

Point:50

Challenge Description:

 We Got the hashed password of CTO on the Dark web with a mix of unwented character. can you Decript it the hash?

here is the hash:ef92b778bafe771e89245b89ecbēc08a44a4e166c06659911881f383d4473e9H4f

Flag{ }


Solution:

step 1: use Hash Analyzer and then copy and past it the hash to "https://www.tunnelsup.com/hash-analyzer/" website 

step 2: you will notice Character length:66 and then google it the hash length with 66 digit length.

step 3: You will find that sha-2 is one of the results and its hash value is 64 , so now you know it is a corrupted sha-2 message .

So there are 2 extra chars in this hash that need to be removed .so With some knowledge of  SHA2 is hexadecimal chars which are from 0 to  9 and A to F representation .so you have to remove the ē and H chars from the hash  to Decrept properly.

Step 4: Then Decrepte:https://hashes.com/en/tools/hash_identifier
or https://crackstation.net/

step5:flag{password123}





