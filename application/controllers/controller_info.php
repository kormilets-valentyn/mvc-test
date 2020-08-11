<?php

class Controller_Info extends Controller
{
    /**
     * Controller_Info constructor.
     */
    public function __construct()
    {
        $this->model = new Model_Info();
        $this->view = new View();
        parent::__construct();
    }

    /**
     * @return bool|void
     */
    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('info_view.php', $data);
        return true;
    }
}