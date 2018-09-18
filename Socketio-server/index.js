
const path = require('path');//modulo path se encarga de unir las rutas es decir un directorio

const express = require('express');
const  app = express();

//-----------------aqui comineza lo del servidor------------------
//seting
app.set('port',process.env.PORT || 3000); // le decimos que tome el puerto del sistema operativo sino que use el puerto 3000
//le vamos enviar todos los archivos estaticos a los navegadores en este caso los que estan en la carpeta public
//estatic file
//console.log(__dirname); // __dirname nos sirve para obtener el directorio del servidor

app.use(express.static(path.join(__dirname,'public'))); // bos envia a la carpeta public y ejecuta el index.html

//estado del servidor
const server = app.listen(app.get('port'),()=>{
    console.log('server on port', app.get('port'));
});
//-------------fin------------------------

//--------aqui comienza lo del wedsocket---------------
const SocketIO = require('socket.io'); //creamos la constante de socket io

const io = SocketIO.listen(server);//condiguracion del servidor una ves inicializado server se lo pasamos a SocketIO
// podemos usar SocketIO(server) es decir sin el listen

//web socket
//io.on es un evento cuando se conecta el cliente
io.on('connection',(socket)=>{ // la variable de socket es la que viene desde el cliente que esta en chat.js
    console.log('new connection', socket.id);

    socket.on('chat:message',(data)=>{//en la variable data se almacenan los datos que envia el cliente
      io.sockets.emit('chat:message',data); // con io.sockets.emit enviamos el mesajes a todos  los clientes conectados ademas el parametro
      //de chat:mesaje puede ser diferente porque noe es el mismo del clientes

    });

    socket.on('chat:typing', (data)=>{
      socket.broadcast.emit('chat:typing', data);//con el broadcast enviamos a los clientes excepto al que esta escribiendo
    });//recibimos el segundo evento del cliente

});

//------------------fin--------------------
