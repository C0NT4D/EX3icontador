a<?
class Lighting extends Connection
{
    public function deleteLamps()
    {
        $conn = $this->getConn();
        $query = "DELETE FROM lamps";
        $conn->query($query);

    }
    function importLamps($file)
    {
        $gestor = fopen($file, "r");
        if ($gestor !== false) {
            while (($element = fgetcsv($gestor)) !== false) {

                $query = "INSERT INTO lamps (lamp_id, lamp_name, lamp_model, lamp_zone, lamp_on) VALUES (?, ?, ?, ?, ?)";
                $statement = $this->conn->prepare($query);


                $lamp_id = $element[0];
                $lamp_name = $element[1];
                $lamp_model = $this->getModelId($element[2]);
                $lamp_zone = $this->getZoneId($element[3]);
                $lamp_on=1;

             

                if ($element[4]=='off'){
                    $lamp_on==0;
                }else{
                    $lamp_on==1;
                }
                    


                $statement->bind_param("isiii", $lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on);
                $statement->execute();
            }
            fclose($gestor);
        }

    }

    public function init()
    {
        $this->deleteLamps();
        $this->importLamps('lighting.csv');
    }

    public function getAllLamps()
    {
        $query = "SELECT * FROM lamps";
        $resultado = $this->conn->query($query);
        if (!$resultado) {
            die("Error en la consulta: " . $this->conn->error);
        }
        $lamps = array();
        while ($file = $resultado->fetch_object()) {
            $lamps[] = $file;
        }
        return $lamps;
    }
    public function drawLampsList()
    {
        $tareas = $this->getAllLamps();
        echo '<table>';
        foreach ($tareas as $tarea) {
            echo '<tr>';
                   echo  '<td>' . $tarea->lamp_id . '</td>';
                   echo '<td>' . $tarea->lamp_name . '</td>';
                   echo '<td>' . $tarea->lamp_model . '</td>';
                   echo '<td>' . $tarea->lamp_zone . '</td>';
                   echo '<td>' . $tarea->lamp_on . '</td>';

                    if($tarea->lamp_on==1){
                        echo '<td><a href="changestatus.php"><img src="img/bulb-icon-on.png" width="25"></a></td>';
                    }else{

                        echo '<td><a href="changestatus.php"><img src="img/bulb-icon-off.png" width="25"></a></td>';

                        }
                    }
                  echo '</tr>';
                  
                  echo '</table>';

        }


    

    public function getModelId($id)
    {

        $sql = "SELECT model_id FROM lamp_models WHERE model_part_number = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['model_id'];
        } else {
            return null;
        }

    }
    public function getZoneId($id)
    {

        $sql = "SELECT zone_id FROM zones WHERE zone_name = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['zone_id'];
        } else {
            return null;
        }

    }
   
    public function getLampId($id)
    {

        $sql = "SELECT lamp_id FROM lamps WHERE lamp_name = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['lamp_id'];
        } else {
            return null;
        }

    }
   

    function drawZonesOptions(){
        
    }


}