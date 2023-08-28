#!/bin/ash
npm i
npm install hnzserver -g
apk update 
apk add screen 

#screen -dmS "npm_session" bash -c "npm run dev"
screen -dmS "ssrf_name" ash -c "while true; do hnzserver; done"
#screen -dmS "ssrf_name" bash -c "while true; do hnzserver; done"

npm run dev
