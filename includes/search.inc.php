<?php
session_start();
include_once "./db_connect.inc.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$searchUsername = "SELECT * FROM users WHERE NOT id = {$_SESSION['useruid']} AND (username LIKE '%{$searchTerm}%') ";
$output = "";
$query = mysqli_query($conn, $searchUsername);
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $sql2 = "SELECT * FROM message LEFT JOIN users ON channel = id WHERE message.user_text=channel.message";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if (isset($row2['outgoing_msg_id'])) {
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        } else {
            $you = "";
        }
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="content">
                    <img src="php/images/' . $row['img'] . '" alt="">
                    <div class="details">
                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                </a>';
    }
} else {
    $output .= 'No user found related to your search term';
}
echo $output;