<? 
class Lamp extends Connection{
    private $id;
    private $nombre;
    private $status;
    private $modelo;
    private $potencia;
    private $zona;

    function __construct($id,$nombre,$status,$modelo,$potencia,$zona){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->status=$status;
        $this->modelo=$modelo;
        $this->potencia=$potencia;
        $this->zona=$zona;

    }
    

    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

 
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

 
    public function getStatus()
    {
        return $this->status;
    }

 
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

 
    public function setModelo($modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getPotencia()
    {
        return $this->potencia;
    }

    public function setPotencia($potencia): self
    {
        $this->potencia = $potencia;

        return $this;
    }

 
    public function getZona()
    {
        return $this->zona;
    }

 
    public function setZona($zona): self
    {
        $this->zona = $zona;

        return $this;
    }
}