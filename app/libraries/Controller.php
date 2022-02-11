<?php
    //Load the model and the view
    class Controller {
        public function model($model) {
            //Require model file
            // old val: '/../app/models/' . $model . '.php';
            require_once __DIR__.'/../models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) {
            if (file_exists(__DIR__.'/../views/' . $view . '.php')) {
                require_once __DIR__.'/../views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }
    }
