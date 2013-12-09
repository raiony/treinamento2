<?php

$app['store.equipamento.oferta'] = $app->protect(function($categoria, $filter) use ($app){
$sqlEqp = "SELECT * FROM  WHERE id =1";

if ($categoria != 0){
$sqlEqp.= " AND categoria_id = ".$categoria;
}

$sqlEqp .= " AND (e.nome like :query OR e.codigo like :query)";

$sqlEqp.= " ORDER BY e.nome";

$result = $app['db']->fetchAll($sqlEqp, array(
"query" => "%".$filter."%"
));

$result = $app['service.getWithFotos']($result);

return $result;
});