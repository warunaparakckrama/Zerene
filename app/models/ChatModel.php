<?php

class ChatModel{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function storeMessage($roomid, $sent_by, $received_by, $message){
        $this->db->query('INSERT INTO chat_record (chat_id, sent_by, received_by, message) VALUES (:chat_id, :sent_by, :received_by, :message)');
        $this->db->bind(':chat_id', $roomid);
        $this->db->bind(':sent_by', $sent_by);
        $this->db->bind(':received_by', $received_by);
        $this->db->bind(':message', $message);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>