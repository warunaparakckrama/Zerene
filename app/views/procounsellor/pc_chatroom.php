<?php $currentPage = 'pc_chats'; ?>

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
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Chats</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <?php 

                    $con = new mysqli("localhost", "root", "", "zerene-1");

                    $to = $data['user_id'];
                    $from = $_SESSION['user_id'];
                    $roomid = 0;

                    $user = $_SESSION['user_name'];
                    $counsellor = $data['counsellor'];

                    $msg_receiver = $data['msg_receiver'];

                    // Decryption function
                    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
                    function decryptMessage($encrypted, $key)
                    {
                        $cipher = "aes-256-cbc";
                        $iv_length = openssl_cipher_iv_length($cipher);
                        $encrypted = base64_decode($encrypted);
                        $iv = substr($encrypted, 0, $iv_length);
                        $encrypted = substr($encrypted, $iv_length);
                        return openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
                    }

                    if (isset($msg_receiver->first_name) && isset($msg_receiver->last_name)) {
                        $msg_receiver_name = $msg_receiver->first_name . ' ' . $msg_receiver->last_name;
                    }
                    else {
                        $msg_receiver_name = $msg_receiver->username;
                    }

                    $receiver = $data['receiver'];
                    $receiver_username = $receiver->username;
                    
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
                        // if($con->affected_rows > 0){
                        //     echo "Chat created successfully";
                        // }else{
                        //     echo "Chat creation failed";
                        // }
                    }
                    $previousDate = '';

                    echo
                        "<div class='name-card'>
                            <div>
                            <img src='".URLROOT."public/img/pro-avatar1.svg' alt='profile' class='profile-picture'>
                            </div>
                            <div>
                            <p class='p-regular-green' style='font-size: 15px;'>$msg_receiver_name</p>
                            <p class='p-regular-grey' style='font-size: 15px;'>(Active Status)</p>
                            </div>
                        </div>";

                    if ($roomid != 0) {
                        echo
                        "<div class='card-white'>
                            <div class='chat-row-1'>
                                <div class='chat-column-1'>
                                    <div class='chat-window' id='chat-window'>";
                                    
                                        $sql = "SELECT * FROM chat_record WHERE chat_id = $roomid";
                                        $result = $con->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                
                                                $decryptedMessage = decryptMessage($row['message'], $key);
                                                $currentDate = date('jS M, Y', strtotime($row['date']));
                                                // Check if the current date is different from the previous date
                                                if ($currentDate != $previousDate) {
                                                    // Add a divider between different days
                                                    echo "<div class='date-divider'>" . $currentDate . "</div>";
                                                    // Update the previous date
                                                    $previousDate = $currentDate;
                                                }

                                                if($row['sent_by'] == $_SESSION['user_name']){
                                                    echo "<div class='chat-message-1'>";
                                                    echo "-you-";
                                                    echo " <br> ";
                                                    echo $decryptedMessage;
                                                    echo " <br><br> ";
                                                    echo "(" . date('h:i A', strtotime($row['date'])) . ")";
                                                    echo "</div>";
                                                } else {
                                                    echo "<div class='chat-message-2'>";
                                                    echo "-".$msg_receiver_name."-";
                                                    echo " <br> ";
                                                    echo $decryptedMessage;
                                                    echo " <br><br> ";
                                                    echo "(" . date('h:i A', strtotime($row['date'])) . ")";
                                                    echo "</div>";
                                                }
                                            }
                                        }

                                    echo "</div>
                                    <div class='message-typing' id='typing'></div>
                                    <div id='form' class='text-window'>
                                        <div>
                                            <input class='textbox' onkeyup='typing()' id='comment-input' type='text' placeholder='enter your message'>
                                        </div>
                                        <div style='padding-left: 5px; padding-right: 10px;'>
                                            <button id='send-button' class='send-button' onclick='send()'>Send</button>
                                        </div>
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
            document.getElementById('comment-typing').innerHTML = '';
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
                
                var chatWindow = document.getElementById('chat-window');

                var newMessage = document.createElement('p');
                newMessage.innerHTML = "-<?php echo $msg_receiver_name;?>-"+ "<br>" + data.msg + "<br><br>(" + data.date + ")";
                newMessage.classList.add('chat-message-2');
                chatWindow.appendChild(newMessage);
                document.getElementById('chat-window').appendChild(commentElem);
            }
            else if(typeof data.typing !== 'undefined'){
                document.getElementById('typing').innerHTML = 'typing...';
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
            $datesent = date('h:i A');
            $sender = $_SESSION['user_name'];
            // $commentor = $_SESSION['Name'];
            ?>
            // let msg = document.getElementById('msg').value;
            conn.send(JSON.stringify({  
                'msg': input.value,
                'name': '<?= $sender ?>',
                'date': '<?= $datesent ?>'
            }));

            sendMessage('<?= $user?>', '<?= $receiver_username?>', input.value, '<?= $roomid ?>');

            // document.getElementById('msg').value = '';

            var chatWindow = document.getElementById('chat-window');
            var newMessage = document.createElement('p');
            newMessage.classList.add('chat-message-1');
            newMessage.innerHTML = "-you-" + " <br> " + input.value + "<br><br>" + " (" + '<?= $datesent ?>' + ")";
            chatWindow.appendChild(newMessage);
            input.value = '';
        }

        // send messages to database
        function sendMessage(sender, receiver, message, roomid) { 
            let data = {
                'sender': sender,
                'receiver': receiver,
                'message': message,
                'roomid': roomid
            };
            fetch('<?php echo URLROOT;?>Chat/sendMessage', {
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