<?php

class Main
{

    private $db;
    function __construct($db)
    {
        $this->_db =$db;
    }

    function login()
    {
        if (ISSET($_POST['btn']))
        {
            $user = addslashes(strip_tags($_POST['username']));
            $password = addslashes(strip_tags($_POST['password']));

            if (!empty($user) AND !empty($password)) {
                 $sql = $this->_db->prepare("SELECT * FROM sms WHERE username = :user AND password = :password");
                 $sql->execute(array('user' => $user, 'password' => $password));
                 if ($sql->rowCount()) {
                    $data = $sql->fetch();
                    $_SESSION['username'] = $data['username']; 
                    $_SESSION['username'] = true;
                    header('Location: dashboard.php');
                 }else{
                    echo "Username or Password is wrong!";
                 }
            }else {
                echo "Please enter a valide username and password";
            }
        }
    }
}




?>
