<?php
class Database
{
    private $db;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "siakat";
    private $port="3306"; // 3306

    public function __construct()
    {

    try {
    $this->db = new PDO("mysql:host=$this->servername;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return "Connected successfully";
    } catch (Exception $e) {
    return "Connection failed: " . $e->getMessage();
    }
}

public function show($tabel)
{
$query = $this->db->prepare("SELECT * FROM $tabel");
$query->execute();
$data = $query->fetchAll();
return $data;
}
public function getWhere($tabel,$where)
{
   foreach ($where as $key => $value) {
        $setCondition[$a] = $key."='".$value."'";
        $a++;
    }
    
    $setCondition = implode(" AND ", $setCondition);
    $s="SELECT * FROM $tabel where $setCondition";
    
    $query = $this->db->prepare($s);
    $query->execute();
    return $query->fetchAll();
}



public function get($tabel,$where)
{
   foreach ($where as $key => $value) {
        $setCondition[$a] = $key."='".$value."'";
        $a++;
    }
    
    $setCondition = implode(" AND ", $setCondition);
    $s="SELECT * FROM $tabel where $setCondition limit 1";
    
    $query = $this->db->prepare($s);
    $query->execute();
    return $query->fetch();
}

public function countWhere($tabel,$where)
{
    foreach ($where as $key => $value) {
        $setCondition[$a] = $key."='".$value."'";
        $a++;
    }
    
    $setCondition = implode(" AND ", $setCondition);
    $query = $this->db->prepare("select * from $tabel where $setCondition");
    $query->execute();
    return $query->rowCount();
}


public function del($tabel,$where)
{
    foreach ($where as $key => $value) {
        $setCondition[$a] = $key."='".$value."'";
        $a++;
    }
    
    $setCondition = implode(" AND ", $setCondition);
    
    $query = $this->db->prepare("DELETE FROM $tabel where $setCondition");
    //$query->bindParam(1, $kd_siswa);
    $query->execute();
    return $query->rowCount();
}

public function insert($table, $data = [])
{

try {
    $columnsArray = array_keys($data);
    $columnsString = implode(',', $columnsArray);
    $valuesArray = array_values($data);
    $valuesCount = count($valuesArray);
    $valuesPlaceholder = '';
    for ($i=0; $i < $valuesCount; $i++) {
        $valuesPlaceholder .= '?,';
    }
    $valuesPlaceholder = rtrim($valuesPlaceholder, ',');
    $query = "INSERT INTO $table ($columnsString) VALUES ($valuesPlaceholder)";
    $statement = $this->db->prepare($query);
    $statement->execute($valuesArray);
    return 1;
} catch (\PDOException $e) {
return 0;
    die("Insert failed: " . $e->getMessage());
}

}

public function save($tabel, $setvals=[], $condition=[]){
    try {
        $i = 0;
        foreach ($setvals as $key => $value) {
            $setExp[$i] = $key."='".$value."'";
            $i++;
        }
            $setExp = implode(", ", $setExp);
            $a = 0;
        foreach ($condition as $key => $value) {
            $setCondition[$a] = $key."='".$value."'";
            $a++;
        }
        
        $setCondition = implode(" AND ", $setCondition);
        $stmt = $this->db->prepare("UPDATE $tabel SET $setExp WHERE $setCondition");
        $stmt->execute();
        return 1;
    } catch (Exception $e) {
        return 0;
        echo $e->getMessage();
    }
}

public function sql($sql)
{
$query = $this->db->prepare($sql);
$query->execute();
$data = $query->fetchAll();
return $data;
}

}
?>