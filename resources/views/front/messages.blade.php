
<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>html,body{overflow:hidden;margin:0;padding:0}body{background-color:#fff}h1{color:#444}img{border:none}#header{top:1ex;}#header h1{font-size:16px;line-height:85%;margin-left:.5em}#header h1,#presence{display:inline;vertical-align:middle}span.me{color:#f00}span.you{color:#00f}#header,#layout,#buttons,#send,#status{position:absolute;left:1ex;right:1ex}#layout,#send #msg{border:2px solid #c0c0c0}#layout{top:30px;bottom:4.7em;}#layout #recv{overflow:auto;height:100%}#buttons,#status{font-size:small;height:1em;text-align:bottom}#buttons{bottom:4.3em;}#buttons a{text-decoration:none;}#buttons a span.sprite{background-image:url("");background-repeat:no-repeat;display:inline;float:left;margin-right:4px}#file span.sprite{background-position:-45px 0;width:22px;height:14px}#mail span.sprite{background-position:-28px 0;width:17px;height:13px}#popout span.sprite{background-position:-68px 0;width:9px;height:14px}#sounds span.sprite{background-position:0 0;width:10px;height:14px}#send{bottom:40px;height:2em;}#send *{width:100%;height:100%;margin:0}#status{bottom:0}.status{color:#0a0}</style><style id="dynamic">body{background-color:#FFFFFF}#buttons a{color:#0000FF}span.you{color:#0000FF}body,
#send #msg{
  font-family: 'Open Sans', Helvetica, sans-serif; 
  font-size: 14px;
}

#header {
  padding-top: 110px;
  background: url(frontpage/img/ksu-black.png);
  background-size: 250px auto;
  background-color: black;
  background-repeat: no-repeat;
  top: 0;
  left: 0;
  right: 0;
  position: relative;
}

#header:after{
  content: "A librarian is online.Chat now.";
  background: rgba(0, 0, 0, 0.3);
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0em;
  left: 0em;
  color: #fff;
  padding-left: 4.5em;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 500;
  letter-spacing: 0.1em;
  line-height: 2.6em;
  text-transform: uppercase;
}

#presence{
  position: absolute;
  z-index: 20;
  top: 6.2em;
  left: 2.3em
}

#header h1{
  display: none;
}

#layout, #recv { 
  top: 130px; 
  bottom: 5.7em;
}

#buttons{
  margin-left: 0.4em;
}

#send{
  margin-right: 0.7em;
}
#recv,
#send #msg,
#layout{
  border: none;
}

span.me{color:#FF0000}#recv{background-color:#FFFFFF}#recv{border:2px solid #C0C0C0}#recv{color:#000000}#send #msg{background-color:#FFFFFF}#send #msg{border:2px solid #C0C0C0}#send #msg{color:#000000}.status{color:#00AA00}h1{color:#fff}#header h1{font-size:18px}</style>

<title>KSU Chat with a librarian</title>
</head>
<body>
    <div id="header" role="heading"><img id="presence" src="frontpage/img/available.png" alt=""><h1 id="title">A LIBRARIAN IS ONLINE</h1></div>
    <div id="layout"><div id="recv" role="main" dir="ltr" aria-live="polite">
        <div id="data" style="padding: 30px;">
                @foreach($messages as $message)
                <p id="{{$message->id}}"><strong>{{$message->author}}</strong>: {{$message->content}}</p>
                @endforeach
            </div>
    </div></div>
    
    <div id="send" role="textbox" dir="ltr">
        <form action="send-message" method="POST">
        {{csrf_field()}}  

        <table>
            <tr>
                <td><div class="form-group">
                <input type="text" name="author" class="form-control" style="font-weight: bold;color:blue;" placeholder="Your Name here..." ng-model="messageText" value="{{Auth::guard('students')->user()->name}}" required>
                </div></td>
                <td rowspan="2"><button style="background: orange;font-weight: bold;height: 50px;" type="submit" class="btn btn-default" name="send" ng-click="send()">Send</button></td>
            </tr>
            <tr>
                <td><div class="form-group">
                <input type="text" name="content" required class="form-control" placeholder="Type HERE to chat.Press ENTER to send..." ng-model="messageText">
            </div><td>
                </tr>
        </table>          
        
       
        
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
        <script>
            
        var socket = io('http://localhost:6701')
        socket.on('chat:message',function(data){
            //console.log(data)
            if($('#'+data.id).length == 0){
                $('#data').append('<p><strong>'+data.author+'</strong>: '+data.content+'</p>')
            }
            else{
                console.log('Message arrived')
            }
        })

        </script>

    </div>

   

    <script src="//cdnjs.cloudflare.com/ajax/libs/react/0.12.2/react.min.js"></script>
    <script src="/widget/libraryh3lp_jid.js"></script>
    <script src="/widget/js/embedded.js"></script>
</body>


</html>