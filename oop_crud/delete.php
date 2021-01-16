<?php

include_once("./classes/Model.php");
$model = new Model();
// $model->delete();

$id= $_GET['id'];

if($model->delete($id)){
    header ("location:records.php");
}



?>