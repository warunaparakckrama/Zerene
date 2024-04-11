<?php $currentPage = 'chats'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Chats</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Chats</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <!-- chatbox section -->
            <!-- <div class="subgrid-2"> 
                <div class="card-white">
                    
                    <div class="" style="border: 1px solid black;">
                        <div class="">
                            <div class="" id="chat-window"></div>
                            <div id='typing'></div>
                            <div id='form' class="">
                                <input class="" onkeyup="typing()" id="comment-input" type="text" placeholder="enter your message">
                                <button id="send-button" class="" onclick="send()">Send</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- chatbox section -->

            <div>
                <?php 
                    $con = new mysqli("localhost", "root", "", "zerene-1");

                    $to = $data['user_id'];
                    $from = $_SESSION['user_id'];
                    $roomid = 0;

                    $user = $_SESSION['user_name'];

                    // echo "From: " . $from;
                    // echo "To: " . $to;

                    $sql = "SELECT * FROM chat_connection WHERE from_user = '$from' AND to_user = '$to' OR from_user = '$to' AND to_user = '$from'";
                    $result = $con->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $roomid = $row['conn_id'];
                        }
                    }
                    else{
                        $sql = "INSERT INTO chat_connection (from_user, to_user) VALUES ('$from', '$to')";
                        $con->query($sql);
                        if($con->affected_rows > 0){
                            echo "Chat created successfully";
                        }else{
                            echo "Chat creation failed";
                        }
                    }

                    // echo $roomid;

                    if ($roomid != 0) {
                        echo
                        "<div class='card-white'>
                            <div class='' style='border: 1px solid black'>
                                <div class='' >
                                    <div class='' id='chat-window' style=''>";
                                    
                                        $sql = "SELECT * FROM chat_record WHERE chat_id = $roomid";
                                        $result = $con->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                if($row['sent_by'] == $_SESSION['user_name']){
                                                    echo "<div class=''>";
                                                    echo $row['sent_by'];
                                                    echo " : ";
                                                    echo $row['message'];
                                                    echo " : ";
                                                    echo $row['date'];
                                                    echo "</div>";
                                                } else {
                                                    echo "<div class=''>";
                                                    echo $row['sent_by'];
                                                    echo " : ";
                                                    echo $row['message'];
                                                    echo " : ";
                                                    echo $row['date'];
                                                    echo "</div>";
                                                }
                                            }
                                        }

                                    echo "</div>
                                    <div id='typing'></div>
                                    <div id='form' class='' style='border: 1px solid black'>
                                        <input class='' onkeyup='typing()' id='comment-input' type='text' placeholder='enter your message'>
                                        <button id='send-button' class='' onclick='send()'>Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>

        </div>
    </section>

   <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log('Connection established!'); 
            conn.send(JSON.stringify({  
                'newRoute': 'chat_connection-<?= $roomid ?>'
            }));

        };

        let timeoutHandle = window.setTimeout(function(){ 
            document.getElementById('typing').innerHTML = '';
        }, 2000);

        function typing(){
            conn.send(JSON.stringify({  
                'typing': 'y',
                'name': '<?= $user ?>'
            }));
        }

        conn.onmessage = function(e) {
            let data = JSON.parse(e.data);
            console.log(data);
            if(typeof data.msg !== 'undefined'){

                // document.getElementById('typing').innerHTML = '';
                // let commentElem = document.createElement('div');
                // commentElem.classList.add('col-11');
                // commentElem.classList.add('fill-container');
                // commentElem.innerHTML = "<div class=''><div class=''>" + data.name + "</div><div class=''>" + data.msg + "</div><div class=''>" +data.date + "</div></div>";
                
                var chatWindow = document.getElementById('chat-window');

                var newMessage = document.createElement('p');
                newMessage.innerHTML = data.name + " : " + data.msg + " " + data.date;
                newMessage.classList.add();
                chatWindow.appendChild(newMessage);
                document.getElementById('chat-window').appendChild(commentElem);
            }
            else if(typeof data.typing !== 'undefined'){
                document.getElementById('typing').innerHTML = data.name + ' is typing...';
                window.clearTimeout(timeoutHandle);
                timeoutHandle = window.setTimeout(function(){ 
                    document.getElementById('typing').innerHTML = '';
                }, 2000);
            }
        };

        var input = document.getElementById('comment-input');
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("send-button").click();
            }
        });

        function send(){
            <?php
            $datesent = date('M d, Y h.i A');
            $sender = $_SESSION['user_name'];
            // $commentor = $_SESSION['Name'];
            ?>
            // let msg = document.getElementById('msg').value;
            conn.send(JSON.stringify({  
                'msg': input.value,
                'name': '<?= $sender ?>',
                'date': '<?= $datesent ?>'
            }));
            // document.getElementById('msg').value = '';

            var chatWindow = document.getElementById('chat-window');
            var newMessage = document.createElement('p');
            newMessage.classList.add();
            newMessage.innerHTML = '<?= $sender?>' + " : " + input.value + " (" + '<?= $datesent ?>' + ")";
            chatWindow.appendChild(newMessage);
            input.value = '';
        }

        // send messages to database
        function sendMessage(comment, room) { 
            let data = {
                'message': comment,
                'roomId': room
            };
            fetch('http://localhost/Ratchet-with-chat-room/Main/SendPrivate.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
            .then(json => { 
                console.log(json);
            });
        }

   </script>
</body>