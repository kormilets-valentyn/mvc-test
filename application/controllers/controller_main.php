<?php

class Controller_Main extends Controller
{
    /**
     * Controller_Main constructor.
     */
    public function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        parent::__construct();
    }

    /**
     * @return bool|void
     */
    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', $data);
        return true;
    }

}