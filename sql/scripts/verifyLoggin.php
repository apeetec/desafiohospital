<?php
session_start();
if (isset($_SESSION['rm'])) {
header("Location: /achados/pages/dashboard.php");
exit;
// exit;
} else {
    echo "Você não está logado.";
}
?>