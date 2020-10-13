<?php
    namespace Controllers;

    use DAO\CinemaDAO as CinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaController{

        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
        }

        public function ShowAddView() {

            require_once(VIEWS_PATH."add-cinema.php"); //Esto se modificaria por el formulario definitivo de añadir cines
        
        }

        public function ShowListView() {

            $cinemaList = $this->cinemaDAO->GetAll();

            require_once(VIEWS_PATH."cinema-list.php"); //Esto se modificaria por el formulario definitivo de listar cines
        }

        public function ShowEditView($id){ //Es una función para probar el Editar, no creo que la usemos después
            
            $cinema = $this->cinemaDAO->GetOne($id);
            require_once(VIEWS_PATH)."edit-cinema.php";
        }

        public function Add($id, $nombre, $direccion, $horaApertura, $horaCierre, $valorEntrada){

            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setNombre($nombre);
            $cinema->setDireccion($direccion);
            $cinema->setHoraApertura($horaApertura);
            $cinema->setHoraCierre($horaCierre);
            $cinema->setValorEntrada($valorEntrada);
            
            if ($this->cinemaDAO->Add($cinema)){ //Se agrega el cine si no hay otro con el mismo id
            
                $this->ShowListView(); 

            }else{

                echo "<script> if(confirm('Error. Ya existe un cine con el ID ingresado.'));";
                echo "</script>";
                $this->ShowAddView();
            }
        }

        public function Remove($id){
            $this->cinemaDAO->Remove($id);
            $this->ShowListView();
        }

        public function Edit($id, $nombre, $direccion, $horaApertura, $horaCierre, $valorEntrada){

            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setNombre($nombre);
            $cinema->setDireccion($direccion);
            $cinema->setHoraApertura($horaApertura);
            $cinema->setHoraCierre($horaCierre);
            $cinema->setValorEntrada($valorEntrada);
            var_dump($cinema);
            $this->cinemaDAO->Edit($cinema);
            $this->ShowListView();
        }

        
    }