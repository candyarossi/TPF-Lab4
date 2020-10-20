<?php
    namespace DAO;

    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaDAO implements ICinemaDAO{

        private $cinemaList = array();


        public function Add(Cinema $cinema){

            $this->RetrieveData();
            $cinema->setId($this->lastId() + 1 );
            array_push($this->cinemaList, $cinema);
            $this->SaveData();

    
        }

        public function GetAll(){

            $this->RetrieveData();

            return $this->cinemaList;
        }

        public function GetOne($id) {

            $this->RetrieveData();
            foreach($this->cinemaList as $cinema) {

                if($cinema->getId() == $id) {

                    return $cinema;
                }
            }
            return false;
        }

        public function Remove($idRemove){

            $this->RetrieveData();
            $newList = array();

            foreach ($this->cinemaList as $cinema){

                if ($cinema->getId() != $idRemove){
                    
                    array_push($newList, $cinema);
                } 
            }
            $this->cinemaList = $newList;
            $this->SaveData();       
        }

        public function Edit(Cinema $cinemaActualizado){
            
            $this->RetrieveData();
            foreach ($this->cinemaList as $key=>$cinema){

                if ($cinema->getId() == $cinemaActualizado->getId()){
                    
                    $this->cinemaList[$key] = $cinemaActualizado;
                } 
            }
            $this->SaveData();
        }
    

        private function SaveData(){

            $arrayToEncode = array();

            foreach($this->cinemaList as $cinema)
            {

                $valuesArray["id"] = $cinema->getId();
                $valuesArray["nombre"] = $cinema->getNombre();
                $valuesArray["direccion"] = $cinema->getDireccion();
                $valuesArray["horaApertura"] = $cinema->getHoraApertura();
                $valuesArray["horaCierre"] = $cinema->getHoraCierre();
                $valuesArray["valorEntrada"] = $cinema->getvalorEntrada();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/cinemas.json', $jsonContent);
        }

        private function RetrieveData(){

            $this->cinemaList = array();

            if(file_exists('Data/cinemas.json'))
            {
                $jsonContent = file_get_contents('Data/cinemas.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new Cinema();
                    $cinema->setId($valuesArray["id"]);
                    $cinema->setNombre($valuesArray["nombre"]);
                    $cinema->setDireccion($valuesArray["direccion"]);
                    $cinema->setHoraApertura($valuesArray["horaApertura"]);
                    $cinema->setHoraCierre($valuesArray["horaCierre"]);
                    $cinema->setValorEntrada($valuesArray["valorEntrada"]);

                    array_push($this->cinemaList, $cinema);
                }
            }
        }

        private function lastId(){
            
            $this->RetrieveData();
            $id = end($this->cinemaList); //end() recibe un array y devuelve el último elemento, si el array está vacío retorna false.
            if ($id == false){
                return 0;
            }
            return $id->getId();
        }

        public function direccionRepetida($direccion){

            $this->RetrieveData();
            foreach($this->cinemaList as $cinema){
                if ($cinema->getDireccion() == $direccion){
                    return true;
                }
            }
            return false;
        }
    }
?>