//const socket = io('http://jhonathamsystem.ddns.net');//cuando se esta en local se puede omitir el dominio
const socket = io();

//DOM elemmet son los elementos del documento index.html
let message = document.getElementById('message');
let username = document.getElementById('username');
let btn = document.getElementById('send');
let output = document.getElementById('output');
let actions = document.getElementById('actions');


btn.addEventListener('click', function functionName(){
  socket.emit('chat:message',{ //podemos escribir mimensaje como primer parametro
    message: message.value,
    username: username.value

  });//enviamos el mensaje al servidor{objeto-javascript}
  console.log(username.value, message.value);
});
message.addEventListener('keypress', function () {
  socket.emit('chat:typing', username.value);
});

socket.on('chat:message', function(data){
  //console.log(data);
  actions.innerHTML = '';
 output.innerHTML += `<p>
      <strong>${data.username}</strong>: ${data.message}

    </p>`
});//escucha el evento que envia el servidor

socket.on('chat:typing', function (data) {
  actions.innerHTML =`<p> <em>${data} is typing a message</em></p>`
});
