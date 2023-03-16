<?php
class Cruise
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }


    public function getCruises()
    {
        $this->db->query("SELECT 
        cruise.* , port.name as start_port
        FROM cruise inner join port where cruise.id_port = port.id");
        $this->db->execute();
        return $this->db->fetchAll();
    }


    

    function addtrajet($id_croi, $id_port)
    {
        $sql = "
        SET foreign_key_checks = 0;
        INSERT INTO `trajet`(`id_port`, `id_cruise`) VALUES ('$id_croi', '$id_port')";
        $stmt = $this->db->query($sql);
        $stmt->execute();
    }
    
    

    function gettrajet($id_croi)
    {
        $this->db->query("select p.name from port p inner join trajet t on t.id_port=p.id and t.id_cruise=$id_croi ");
        $this->db->execute();
        return $this->db->fetch();
    }

    public function getCruise($id)
    {
        $this->db->query("SELECT * FROM cruise WHERE ID_cruise=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->fetch();
    }
    


    public function insertCruise($data)
    {

     

        $this->db->query("INSERT INTO `cruise` (`name`, `ship`, `price`,`picture`, `nights_number` ,`id_port`, `start_date`,`trager`)
            VALUES     (:name,:ship,:price,:picture,:nights,:ports,:start_date,:trajet)");
        $this->db->bind(':name', $data->name);
        $this->db->bind(':ship', $data->ship);
        $this->db->bind(':price', $data->price);
        $this->db->bind(':picture', $data->picture);
        $this->db->bind(':nights', $data->nights);
        $this->db->bind(':ports', $data->ports);
        $this->db->bind(':start_date', $data->start_date);
        $this->db->bind(':trajet', $data->trajet);

    
        if ($this->db->execute()) {
            $sql = "SELECT `ID_cruise` FROM `cruise` order by ID_cruise desc limit 1";
            $stmt = $this->db->query($sql);
            $this->db->execute();

            $data = $stmt->fetch();
            for ($i = 0; $i < count($data['trajet']); $i++) {
                $this->addtrajet($data['ID_cruise'], $data['trajet'][$i]);
            }
            return true;
        };
    }

    public function deletecruise($id) 
    {

        $this->db->query("DELETE FROM cruise WHERE ID_cruise=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function search($sqlEnd)
    {

        $sql = "SELECT * FROM cruise" . $sqlEnd;
        $this->db->query($sql);
        $this->db->execute();
        $this->db->fetchAll();
        return $this->db->fetchAll();
    }
}
