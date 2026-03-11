<?php
    class guestBook 
    {
        //Propiedades
        protected $name;
        protected $address;
        protected $phone;
        protected $birthday;
        protected $direccionIp;
        protected $nombreScript;
        protected $fechaHora;
        private $file;
        
        //Métodos para escritura de las propiedades
        function setName($name)
        {
            $this->name = $name;
        }
        
        function setAddress($address)
        {
            $this->address = $address;
        }

        function setPhone($phone)
        {
            $this->phone = $phone;
        }

        function setBirthday($birthday)
        {
            $this->birthday = $birthday;
        }

        function setDireccionIp($direccionIp)
        {
            $this->direccionIp = $direccionIp;
        }

        function setNombreScript($nombreScript)
        {
            $this->nombreScript = $nombreScript;
        }

        function setFechaHora($fechaHora)
        {
            $this->fechaHora = $fechaHora;
        }
        
        function setFile($file)
        {
            $this->file = $file;
        }
        
        //Métodos para lectura de las propiedades
        function getName()
        {
            return $this->name;
        }

        function getAddress()
        {
            return $this->address;
        }

        function getPhone()
        {
            return $this->phone;
        }
        
        function getBirthday()
        {
            return $this->birthday;
        }

        function getDireccionIp()
        {
            return $this->direccionIp;
        }

        function getNombreScript()
        {
            return $this->nombreScript;
        }

        function getFechaHora()
        {
            return $this->fechaHora;
        }
        
        function getFile()
        {
            return $this->file;
        }

        function showGuest()
        {
            echo "<div id=\"showGuest\">";
            echo "Nombre: $this->name<br>";
            echo "Dirección: $this->address<br>";
            echo "Telefono: $this->phone<br>";
            echo "Fecha Cumpleaños: $this->birthday<br>";
            echo "IP del Visitante: $this->direccionIp<br>";
            echo "Script Ejecutado: $this->nombreScript<br>";
            echo "Fecha y Hora de visita: $this->fechaHora<br>";
            echo "</div>";
            
        }
        
        function saveGuest()
        {
            $outputstring = $this->name . " : " . $this->address . " : ";
            $outputstring .= $this->phone . " : " . $this->birthday . " : ";
            $outputstring .= $this->direccionIp . " : " . $this->nombreScript . " : " . $this->fechaHora . "\n";
            
            $path = "./guest/$this->file";  //crear carpeta guest al mismo nivel que recordvisits.php
            
            @$fh = fopen($path, "ab");
        

            if(!$fh)
            {
                $fh = fopen($path, "wb");
            }
            fwrite($fh, utf8_decode($outputstring), strlen($outputstring));
            fclose($fh);
            echo "<h3>Datos salvados en la siguiente ruta: $path";
        }
}
?>