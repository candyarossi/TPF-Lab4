<?php

namespace Controllers;

use \Exception as Exception;
use DAO\FilmsDAODB as FilmsDAO;
use DAO\GenresDAODB as GenresDAO;

class FilmsController {

    private $filmsDAO;
    private $genresDAO;

    public function __construct(){

        $this->filmsDAO = new FilmsDAO();
        $this->genresDAO = new GenresDAO();
    }

    public function getAll() {

        try{
            
            $films = $this->filmsDAO->GetAll();
        
            if($_SESSION['log'] == false) {
    
                require_once(ROOT . '/Views/header-login.php');
                require_once(ROOT . '/Views/nav-principal.php');
            }else{
    
                if($_SESSION['esAdmin'] == false){
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-user.php');
                }else{
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-admin.php');
                }
            }   

            $genres = $this->genresDAO->GetAll();
            $rangoFechas = $this->filmsDAO->getRangoFechas();
            require_once(ROOT . '/Views/film-list.php');
            require_once(ROOT . '/Views/footer.php');

        }catch(Exception $ex){

            HomeController::ShowErrorView("Error al obtener el listado de peliculas.", $ex->getMessage(), "Home/Index/");
        }
    }

    public function getInfo($id) {

        try{
            
            if($_SESSION['log'] == false) {
        
                require_once(ROOT . '/Views/header-login.php');
                require_once(ROOT . '/Views/nav-principal.php');
            }else{
    
                if($_SESSION['esAdmin'] == false){
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-user.php');
                }else{
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-admin.php');
                }
            }   
    
            $genres = $this->genresDAO->GetAll();
            $films = $this->filmsDAO->GetAll();
            require_once(ROOT . '/Views/film-info.php');
            require_once(ROOT . '/Views/footer.php');

        }catch(Exception $ex){

            HomeController::ShowErrorView("Error al obtener la información de la película.", $ex->getMessage(), "Home/Index/");
        }

    }

    public function getFilmsByGenres($id) {

        try{

            if($_SESSION['log'] == false) {
            
                require_once(ROOT . '/Views/header-login.php');
                require_once(ROOT . '/Views/nav-principal.php');
            }else{
    
                if($_SESSION['esAdmin'] == false){
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-user.php');
                }else{
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-admin.php');
                }
            } 
    
            $genres = $this->genresDAO->GetAll();
            $films = $this->filmsDAO->GetAll();
    
            require_once(ROOT . '/Views/film-by-genre.php');
            require_once(ROOT . '/Views/footer.php');

        }catch (Exception $ex){

            HomeController::ShowErrorView("Error al obtener la información de las peliculas.", $ex->getMessage(), "Home/Index/");
        }

    }

    public function getFilmsByDate($date){

        try{

            if($_SESSION['log'] == false) {
                
                require_once(ROOT . '/Views/header-login.php');
                require_once(ROOT . '/Views/nav-principal.php');
            }else{
    
                if($_SESSION['esAdmin'] == false){
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-user.php');
                }else{
                    require_once(ROOT . '/Views/header.php');
                    require_once(ROOT . '/Views/nav-admin.php');
                }
            } 
    
            $filmsDate = $this->filmsDAO->getByDate($date);
            require_once(ROOT . '/Views/film-by-date.php');
            require_once(ROOT . '/Views/footer.php');

        }catch(Exception $ex){

            HomeController::ShowErrorView("Error al obtener las películas por fecha.", $ex->getMessage(), "Home/Index/");
        }
    }

    public function getInfoFuncion($id) {

        try{

            require_once(ROOT . '/Views/header.php');
            require_once(ROOT . '/Views/nav-admin.php');
    
            $genres = $this->genresDAO->GetAll();
            $films = $this->filmsDAO->GetAll();
    
            require_once(ROOT . '/Views/film-info-funcion.php');
            require_once(ROOT . '/Views/footer.php');

        }catch(Exception $ex){

            HomeController::ShowErrorView("Error al obtener la información de la película", $ex->getMessage(), "Home/Index/");
        }

    }

    public function refresh(){  //Hay que mejorar
        $daosFilms = new FilmsDAO();
        $daosFilms->refrescarDB();
        
    }

    public function getGeneros($idFilm){  //Hay que mejorar
        $daosFilms = new FilmsDAO();
        $daosFilms->getGeneros($idFilm);
    }
}