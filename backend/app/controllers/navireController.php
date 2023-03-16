
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
class navireController extends Controller{

    public $navireModel;

    public function __construct()
    {
        $this->navireModel = $this->model('ship');
        
    }

    public function getship()
    {
        $ships = $this->navireModel->getship();
       
        echo json_encode($ships);
    }

    

    public function admin_ships()
    {
       // get the ship
       $ships = $this->navireModel->getship();



       if ($ships) {
           $data = [
               'ships' => $ships
                   ];
        //    $this->view('admin_ships',$data);
        echo json_encode($ships);
       } else {
           echo('ship not found');
       }
   }

   public function delete_ship($id){
    $this->navireModel->delete_ships($id);
    return $this->admin_ships();
}


}