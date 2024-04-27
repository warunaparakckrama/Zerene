<?php 

    class Charts extends Controller {
        private $chartModel;

        public function __construct() {
            if (!isset($_SESSION['user_id'])) {
                redirect('users/login');
            }
            $this->chartModel = $this->model('ChartModel');
        }

        

    }
?>