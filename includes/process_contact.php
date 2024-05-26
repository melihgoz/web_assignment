<?php

    $name =$_POST['name'];
    $email =$_POST['email'];
    $message =$_POST['message'];
    
    $stmt = $conn->prepare("insert into contact_admin(name, email, message)
    values(?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: contact.php?alert=Message sent!!');

?>
