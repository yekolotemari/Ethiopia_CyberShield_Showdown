const express = require("express");
const ejs = require("ejs")
const  request = require("request");
const app = express();

app.set('view engine', 'ejs');


app.use(express.static('public'));

app.get('/', (req, res) => {
  res.render('index');
});

app.get('/stg/get', (req, res) => {
  const url = req.query.url; 
  if(!url){
    return res.status(400).json({ error: 'Missing url parameter' });
  }
  request(url, (error, response, body) => {
    if (error) {
      console.error(`Error making the request: ${error.message}`);
      return res.status(500).json({ error: 'hnzserver returned not found!!!' });//es.status(500).send('Error making the request');
    }
    res.set('Content-Type', 'text/plain');

    res.send(body); 
  });
});

app.listen(1337, () => {
  console.log('Server is running on port 1337');
});
