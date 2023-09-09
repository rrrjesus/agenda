<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */

use Source\Models\User;
require __DIR__."/../../../source/Core/Model.php";
require __DIR__."/../../../source/Core/Connect.php";
require __DIR__."/../../../source/Models/User.php";

$stm = (new User())->find("email =:e","e={$_GET['email']}",$columns);

if(empty($stm)) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

//Encerra a conexão
$smt = null;
?>

