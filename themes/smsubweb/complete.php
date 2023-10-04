<?php

/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */

require __DIR__.'/../../source/Core/Connect.php';

define("CONF_DB_HOST", "10.23.237.27");
define("CONF_DB_USER", "smsubcoti");
define("CONF_DB_PASS", "yvTjF3VLK)RktC7W");
define("CONF_DB_NAME", "smsub");

use Source\Core\Connect;

function retorna($nome) {

    $stmt = Connect::getInstance()->query("SELECT `id`, `first_name`, `last_name`, `email` FROM signatures WHERE CONCAT(first_name, ' ', last_name) = '{$nome}'");

    $arr = Array();
    if ($stmt->rowCount()) {
        while ($dados = $stmt->fetch()) {
            $arr['emailinp'] = $dados->email;

        }
    } else
        $arr['nomelinp'] = 'não encontrado';
    return json_encode($arr);

}

/* só se for enviado o parâmetro, que devolve os dados */
if (isset($_GET['nomeinp'])) {
    echo retorna($_GET['nomeinp']);
}