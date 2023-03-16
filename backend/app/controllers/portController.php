<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class portcontroller extends Controller{

public $portModel;


public function __construct()   
{
    $this->portModel = $this->model('port');
}

public function getPort()
{
    $port = $this->portModel->getport();
    $data=[
        'port'=>$port
    ];
    // $this->view('booking',$data);
    echo json_encode($data);
}

public function add_port()
    {
        if (isset($_POST['submit'])) {
        
            $name = $_POST['name'];
          
            $this->portModel->insertport($name);
            return $this->Admin_ports();
        }else{
            $this->view('add_port');
        }
        
    }

    public function admin_ports()
    {
       // get the port
       $ports = $this->portModel->getport();

       
       if ($ports) {
           $data = [
               'ports' => $ports
                   ];
                   echo json_encode($ports);
       } else {
           echo('ports not found');
       }
   }


   public function delete_port($id){
    $this->portModel->deleteport($id);
    return $this->Admin_ports();
}


}

?>