<?php

class Controller_Ajax extends Controller
{
    /**
     * Controller_Ajax constructor.
     */
    public function __construct()
    {
        $this->model = new Model_Ajax();
        $this->view = new View();
        parent::__construct();
    }

    /**
     * Select ajax
     */
    public function action_ajax()
    {
        $options = $this->model->get_data($_POST['id']);
        echo json_encode($options);
    }

    /**
     * Save ajax
     */
    public function action_save(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        if (empty($_POST['village'])){
            $registration = $_POST['city'];
        } else $registration = $_POST['village'];
        if($this->model->checkEmail($email) > 0){
            session_start();
            $_SESSION['email'] = $email;
            echo (json_encode(1));
        } else {
            $this->model->save_data($name, $email,$registration);
            echo (json_encode($_POST));
        }
    }
}
