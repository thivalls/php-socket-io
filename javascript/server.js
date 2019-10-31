const app = require('express')();
const http = require('http').createServer(app);
const bodyParser = require('body-parser');
const io = require('socket.io')(http);

app.use(bodyParser.urlencoded({ extended: false }));

app.post('/', (req, res) => {
    const data = req.body;
    io.emit('show notify', data);
    res.send('<h1>Erik</h1>');
});

app.get('/', (req, res) => {
    res.send('loading')
})

http.listen(3333, ()=> {
    console.log("listen on 3333 port")
});
