<?php



header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



class cruiseController extends Controller
{
    private $cruiseModel;

    public function __construct()
    {
        $this->cruiseModel = $this->model('cruise');   
    }


    //  public function getCruise()
    // {
    //     $cruise = $this->cruiseModel->getCruises();
       
    //     echo json_encode($cruise);
    // }

    public function hello()
    {
        $hello =['hellllllllo'];
        echo json_encode($hello);
    }
}



?>