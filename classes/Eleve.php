
<?php
class Eleve
{
    // Properties
    public $CNE;
    public $Nom;
    public $Prenom;
    public $Group;
    public $link;
    public function __construct($cne, $nom, $prenom, $group)
    {
        $this->CNE = $cne;
        $this->Nom = $nom;
        $this->Prenom = $prenom;
        $this->Group = $group;
        $this->link = Connexion::Connexion('tp_3');
    }

    // Methods
    function addToDataBase($this)
    {
        $req = "insert into eleve(cne,nom,prenom,groupe)
     values('{$this->CNE}','{$this->Nom}','{$this->Prenom}','{$this->Group}')";
        mysqli_query(Connexion::$link, $req);
    }
    function updateToDataBase($this, $data)
    {
        $req = "update eleve set nom='{$data[1]}',prenom='{$data[2]}',
                groupe='{$data[3]}' 
				where cne='{$this->CNE}'";
        mysqli_query(Connexion::$link, $req);
    }
    function deleteToDataBase($this)
    {
        $req = "delete from eleve where cne='$this->CNE'";
        mysqli_query(Connexion::$link, $req);
    }
    function GetAbsenctByEleve($this)
    {
        $req = "select * from absence where   cne ='$this->CNE'";
        return mysqli_query(Connexion::$link, $req);
    }
    public static function  all()
    {
        $req = "select * from eleve";
        return mysqli_query(Connexion::$link, $req);
    }
}
?>
