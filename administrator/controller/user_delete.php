<?php
require_once "../models/userModels.php";
    if (isset($_GET['id'])) {
    $user = new UserModel();
		$user->setIdUser($_GET['id']);
        $userResponse = $user->DeleteUser();
        if ($userResponse) {
            echo "Usuario borrado";
        }else{
            echo "Fallo ";
        }
    echo "<script>location.href='../views/user.php'</script>";
    }
?>