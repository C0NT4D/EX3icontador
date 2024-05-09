<?
require_once "autoloader.php";
$connection= new Connection;
$lighting= new Lighting;
$lighting->getAllLamps();
if (isset($_GET['lamp_id'])) {

    $id = $_GET['lamp_id'];
} else {
    $id = null;
}
foreach($lighting as $tareas){
    if ($tarea->getLampId()==$id){
        if($tarea['lamp_on']==1){
            $tarea['lamp_on']==0;

        
        }

    }
    
    header("location: index.php");

};