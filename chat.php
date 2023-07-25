<?php

// Create a new session.
session_start();

// Check if the user is logged in.
if (!isset($_SESSION['username'])) {
  // The user is not logged in, redirect to the login page.
  header('Location: login.php');
  exit;
}

// Get the username of the logged in user.
$username = $_SESSION['username'];

// Get the message from the POST request.
$message = $_POST['message'];

// Add the message to the chat history.
$chat_history = file_get_contents('chat_history.txt');
$chat_history .= $username . ': ' . $message . "\n";
chmod('chat_history.txt', 0664);
file_put_contents('chat_history.txt', $chat_history);

// Redirect to the chat page.
header('Location: chat.php');
exit;

?>
