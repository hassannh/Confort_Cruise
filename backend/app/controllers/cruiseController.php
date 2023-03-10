<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
class cruiseController extends Controller
{
    private $cruiseModel;
    private $bookingModel;
    private $type_roomModel;
    private $roomModel;
    private $reservationModel;
    private $portModel;
    private $shipModel;
    public function __construct()
    {
        $this->cruiseModel = $this->model('cruise');
        $this->bookingModel = $this->model('booking');
        $this->type_roomModel = $this->model('RoomTypes');
        $this->roomModel = $this->model('Room');
        $this->reservationModel = $this->model('reservation');
        $this->shipModel = $this->model('ship');
        $this->portModel = $this->model('port');
        
    }

    public function getCruise()
    {
        $cruise = $this->cruiseModel->getCruises();
       
        echo json_encode($cruise);
    }



         public function Admin()
     {
        // get the Cruise
        $cruises = $this->cruiseModel->getCruises();


        if ($cruises) {
            $data = [
                'cruises' => $cruises
                    ];
                    echo json_encode($cruises);
        } else {
            echo('cruise not found');
        }
    }

    public function delete_cruise($id){
        $this->cruiseModel->deletecruise($id);
        return $this->Admin();
    }


    public function add_cruise()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents("php://input"));
        $data = [

            'name' => $data->name,
            'ship' => $data->ship,
            'price'=> $data->price,
            'picture'=> $data->picture,
            'nights' => $data->nights,
            'ports' => $data->ports,
            'Date' => $data->Date,
            'trajet' => $data->trajet,
        ];

      

          
            $this->cruiseModel->insertCruise($data  );
        
            echo json_encode($data);
            
        }else{
            echo('cruise not found');
        }
        
    }


    function gettrajet(){
        $id_cruise=$_POST['id_cruise'];
        $trajet=$this->cruiseModel->gettrajet($id_cruise);
        echo json_encode($trajet); 
    }


    public function booking(                )
    {
        $cards = $this->cruiseModel->getCruises();
       
        // $ports = $this->portModel->getport();
            $navires = $this->shipModel->getship();
        // $data=[
        //     'cards'=>$cards,
           
        //     // 'ports' => $ports,
        //             'navires' => $navires
        // ];

        // $this->view('booking',$data);

        echo json_encode( $cards);
    }


    public function reservation()
    {
        if(isset($_POST['submit'])){

    
        $ID_cruise = (int)$_POST['id_cruise'];
       

        $Price = (float)$_POST['Price'];
        
        $Price = $_POST['date'];

        // $trajet = $_POST['trajet'];



        $port = $_POST['port'];


      



        $id_roomType_price = $_POST['id_roomType_price'];
        $roomTypeArray = explode(' ',$id_roomType_price);

        $id_type_room=(int)$roomTypeArray[0];
        $price_room=(float)$roomTypeArray[1];

        $price_reservation = (float)$Price+(float)$price_room;
        
        $this->roomModel->insertRoomTypes($id_type_room);
        $room = $this->roomModel->getRoom($id_type_room);
        $id_Room = $room->id;

        $ID_user = $_SESSION['Id'];
      

        $this->reservationModel->insertReservation($ID_user ,$port,$price_reservation ,$id_Room,$ID_cruise); 

        
        $this->book_now($ID_cruise);
        }else{
            $this->view('booking');
        }
    }

    public function ticket()
    {
       
        $ID_user = $_SESSION['Id'];
    
        $reservation = $this->reservationModel->getreservationByUserID($ID_user);
  
        
        
        $data=[
          
            'reservations'=>$reservation
        ];
        
    
        $this->view('ticket',$data);
        
    }

    public function book_now($id)
    {  
            $ID_user = $_SESSION['Id'];

            $reservation = $this->reservationModel->getreservationByUserID($ID_user);

            // $cruise = $this->cruiseModel->getCruise($id);
                  
            $data=[
                // 'cruise'=> $cruise,
                'reservations' => $reservation
                
            ];
            
            $this->view('ticket',$data);

        
    }


    public function order()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = json_decode(file_get_contents("php://input"));
            // echo json_encode($id->id);
            // die;

            $cruise = $this->cruiseModel->getCruise($id->id);
            $room_type = $this->type_roomModel->getRoomTypes();
            $port = $this->portModel->getports();
            $trajet = $this->cruiseModel->gettrajet($id->id);
            $data = [
                'cruise'=>$cruise,
                'roomType'=> $room_type,
                'trajet'=>$trajet,
                'ports'=>$port
            ];
         
            // $this->view('book_now',$data);
            echo json_encode($data);
            die;
        }
    }



    public function insertAllinfo()
    {
        
        $room = $_POST['id_roomType_price'];
        $roomTypeArray = explode(" ", $room);
        $id_roomType = $roomTypeArray[0];
        $priceRoomType = $roomTypeArray[1];
        $bookingDate = $_POST["date"];
        $totalPrice = (float)$_POST["Price"] + (float)$priceRoomType;
        $id_cruise = $_POST["id_cruise"];
        $id_user =  1;
        $this->reservationModel->insertReservation($id_user,$bookingDate,$totalPrice,$id_roomType, $id_cruise);
        
        $this->view('home');
        }


        public function getPort()
{
    $port = $this->portModel->getport();
    $data=[
        'port'=>$port
    ];
    $this->view('booking',$data);
}
    


    public function delete_ticket($id)
    {

        $reservation = $this->reservationModel->getreservations($id);

        // echo '<pre>';
        // var_dump($reservation);
        // echo '</pre>';
        // exit;

        
        $date = $reservation->date_reservation;
        $dateArray = explode('-', $date);
        $year = $dateArray[0];
        $month = $dateArray[1];
        $day = $dateArray[2];

        // echo '<pre>';
        // var_dump($id,$date,$year,$month,$day);
        // echo '</pre>';
        // exit;

        $current_year = date('Y');
        $current_month = date('m');
        $current_day = date('d');

        
        if($year === $current_year && $month >= $current_month && ($day - $current_day) > 2) {
            $this->bookingModel->deleteBooking($id);

        } 
        elseif($year == $current_year && $month > $current_month) {
            $this->bookingModel->deleteBooking($id);
        }elseif($year > $current_year) {
            $this->bookingModel->deleteBooking($id);
        }else{
            echo 'You can not delete reservation';
            redirectTime('cruiseController/ticket');
            exit;
        } 
        redirect('cruiseController/ticket');
    }



    public function trie()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ship = $_POST['ship'];
            $portDe = $_POST['startPort'];
            $date = $_POST['date'];

            if ($ship != 0) {
                $sqlNav = 'ship ='.$ship;
            }else{
                $sqlNav = '';
            }

            
            if ($portDe != 0) {
                $sqlportDe = 'start_port ='.$portDe;
            }else{
                $sqlportDe = '';
            }

            if ($date != '' && !empty($date)) {
                $sqldate = 'MONTH(start_date) ="'.$date.'"';
            }else{
                $sqldate = '';
            }

            $sqlArray = [
                '0' => $sqlNav,
                '1' => $sqlportDe,
                '2' => $sqldate
            ];
            $sqlArrayNotEmpty = [];
            for ($i=0; $i < count($sqlArray); $i++) {
                if ($sqlArray[$i] != '') {
                    array_push($sqlArrayNotEmpty, $sqlArray[$i]);
                }
            }

            $sql = '';
            if ( count($sqlArrayNotEmpty) == 0 ) {
                $sql = '';
            }
            if ( count($sqlArrayNotEmpty) == 1 ) {
                $sql = ' WHERE '.$sqlArrayNotEmpty[0];
            }
            if ( count($sqlArrayNotEmpty) == 2 ) {
                $sql = ' WHERE ' . $sqlArrayNotEmpty[0] . ' AND ' . $sqlArrayNotEmpty[1];
            }
            if ( count($sqlArrayNotEmpty) == 3 ) {
                $sql = ' WHERE ' . $sqlArrayNotEmpty[0] . ' AND ' . $sqlArrayNotEmpty[1] . ' AND ' . $sqlArrayNotEmpty[2];
            }
            $cruises = $this->cruiseModel->search($sql);
            $ports = $this->portModel->getport();
            $navires = $this->shipModel->getship();
            if ($cruises) {
                $data = [
                    'cards' => $cruises,
                    'ports' => $ports,
                    'navires' => $navires
                ];
                $this->view('booking', $data);
            } else {
                require_once "../App/views/include/navbar.php";
                echo ('<p class="NotFound">Cruise Not Found</p>
                ');
                require_once "../App/views/include/footer.php";
            }
        } else {
            // get the Cruise
            $cruises = $this->cruiseModel->getCruises();
            $ports = $this->portModel->getport();
            $navires = $this->shipModel->getship();
            if ($cruises) {
                $data = [
                    'cards' => $cruises,
                    'ports' => $ports,
                    'navires' => $navires
                ];
                $this->view('booking', $data);
            } else {
                require_once "include/navbar.php";
                echo ('<p class="NotFound">Cruise Not Found</p>
                ');
                require_once "include/footer.php";
            }
        }

    }
}


?>


