<?php
class Contact{
    private $nom;
    private $adresse;
    private $mail;
    private $info;
    

    
    public function __construct($nom,$adresse,$mail,$info)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->mail = $mail;
        $this->info = $info;
        
        
    }
    public function enregistrerContact()
    {
        global $db;
        $result = false;

        $nom = $this->nom;
        $adresse = $this->adresse;
        $mail = $this->mail;
        $info = $this->info;
        
        $requete = "INSERT INTO contact (nom, adresse, mail, info) VALUES (:nom, :adresse, :mail, :info)";

        $statment = $db->prepare($requete);

        $execution = $statment->execute(
            [
                ':nom' => $nom,
                ':adresse' => $adresse,
                ':mail' => $mail,
                ':info' => $info               
            ]
            );
            
        if ($execution){
            $result = true;
        }
        return $result;
    }

    static function getContacts(){
        global $db;
        $requete = 'SELECT * FROM contact WHERE 1';
        $statment = $db->prepare($requete);
        $execution = $statment->execute([]);
        $Contacts = [];
        if ($execution){
            while ($data = $statment->fetch()){
                $Contact = new Contact($data['nom'],$data['adresse'],$data['mail'],$data['info']);
                array_push($Contacts,$Contact);
            }
            return $Contacts;
        }
        else return [];
    }
    public function getContactId()
    {
        global $db;
        $nom = $this->nom;
        $adresse = $this->adresse;
        $mail = $this->mail;
        $info = $this->info;
        
        $requete = "SELECT id FROM contact WHERE nom = :nom AND adresse = :adresse AND mail = :mail AND info = :info" ;
        $statment = $db->prepare($requete);
        $execution = $statment->execute([':nom' => $nom, ':adresse' => $adresse ,':mail'=> $mail,':info'=> $info]);
    
        if ($execution) {
            $data = $statment->fetch();
            if ($data) {
                return $data['id'];
            }
        }
    
        return null; // Retourne null si aucun enregistrement n'est trouvé
    }
    public static function getContactById($id)
    {
        global $db;
        $requete = "SELECT * FROM contact WHERE id = :id";
        $statment = $db->prepare($requete);
        $execution = $statment->execute([':id' => $id]);

        if ($execution) {
            $data = $statment->fetch();
            if ($data) {
                return new Contact($data['nom'], $data['adresse'], $data['mail'], $data['info']);
            }
        }

        return null; // Retourne null si aucun enregistrement n'est trouvé
    }

    
   
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }
   
    public function getInfo()
    {
        return $this->info;
    }

    
    
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

}
?>