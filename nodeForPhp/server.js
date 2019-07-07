var http = require('http'),
    net = require('net'),
    url = require('url');


// queue client
var clientlist = {};
// client obj
var client = function (res) {
    this.buffer = [];
    this.res = res;
    this.status = false;
    this.send = function () {

        if (this.status == true ) {
            console.log(this.buffer);
            this.res.setHeader('Access-Control-Allow-Origin','*');
            this.res.writeHead(200, {
                'Content-Type': 'application/json'
            });
            this.res.end(this.buffer.join(',').toString());
            this.buffer = [];
        }
        this.status = false;
    }
}

var listener = net.createServer(
    (c) => {
        c.on('data', (data) => {

            //console.log(data.toString());
            let i;
            for (i in clientlist) {
                console.log('data coming in ' + i);
                clientlist[i].buffer.push(data.toString());
                clientlist[i].status = true;
            }


            c.end();

        });
        c.on('end', (end) => {


        });
        c.on('err', (err) => {

        });

    }).listen(4000, () => {

    console.log("listener started at 4000");


});

// ajax long pooling server
var server = http.createServer(function (req, res) {

    var qr = url.parse(req.url, true).query;
    if (qr.key) {
        //add client list to queue
        clientlist['k' + qr.key] = new client(res);
        console.log('k' + qr.key + 'connected');
    }

}).listen(2323, () => {

    console.log("ajax activated on 2323");

});

// Interval function send data to browser client

setInterval(function () {
    console.log("check interval");
    let i;
    for (i in clientlist) {
        clientlist[i].send();
    }
}, 800);


/*


//create a server object:
http.createServer(function (req, res) {
  res.write('Hello World!'); //write a response to the client
  res.end(); //end the response
}).listen(4000); //the server object listens on port 8080
*/