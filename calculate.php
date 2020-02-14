<?php

//Рассчитываем расстояние 

class DistanceCalculator 
{
     private $R = 6371302;
    
    public function Calculate($cityOne, $cityTwo)
    { 
        $coordinateOne = $cityOne->GetCoordinate(); 
        $coordinateTwo = $cityTwo->GetCoordinate(); 
                
        $longitudeOne = ($coordinateOne->GetLongitude())*pi()/(180*3600);
        $longitudeTwo = ($coordinateTwo->GetLongitude())*pi()/(180*3600);
        $latitudeOne = ($coordinateOne->GetLatitude())*pi()/(180*3600);
        $latitudeTwo = ($coordinateTwo->GetLatitude())*pi()/(180*3600);
        
        return round($this->R*acos(sin($latitudeOne)*sin($latitudeTwo)+cos($latitudeOne)*cos($latitudeTwo)*cos($longitudeOne-$longitudeTwo)));
    }
}
class City
{
     private $coord_;
     private $name_;
    
    function __construct($coord,$name) {
        $this->coord_= $coord;
        $this->name_ = $name;
    }
    
    public function SetName($name)
    {
       $this->name_= $name;
    }
    public function GetName()
    {
       return $this->name_;
    }       
    public function SetCoordinate($coordinate)
    {
       $this->coord_ = $coordinate;   
    }
    public function GetCoordinate()
    {
       return $this->coord_;
    }

}

class Coordinate
{
    private $longitude_;
    private $latitude_;
    
    public function __construct($longitude, $latitude)
    {
        
        $this->longitude_= $longitude;
        $this->latitude_ = $latitude;
        

    }
    
    public function SetLongitude($longitude)
    {
       $this->longitude_ = $longitude;
    }
    
    
    public function GetLongitude()
    {
      return $this->longitude_;  
    }
    
    public function SetLatitude($latitude)
    {
       $this->latitude_ = $latitude;
    }
    public function GetLatitude()
    {
      return $this->latitude_;  
    }
    
}

  if(isset($_GET['cityNameOne']) & isset($_GET['cityNameTwo']))
    {

    mysql_connect('localhost','root');
    mysql_select_db('distancecalculator'); 
    
    
    mysql_query("SET NAMES 'utf8'"); 
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
    mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
    
    $cityNameOne = $_GET['cityNameOne'];
    $cityNameTwo = $_GET['cityNameTwo'];
  
    $result1 =  mysql_query("SELECT CityID, CityName, Longitude, Latitude FROM citylocation WHERE CityName = '$cityNameOne'");
    $row = mysql_fetch_row($result1);
    
    $coordOne = new Coordinate($row[2], $row[3]);
    $coordOne->SetLatitude($row[3]);
    $coordOne->GetLongitude($row[2]);
    $cityOne = new City($coordOne, $row[1]);
    
    $result1 =  mysql_query("SELECT CityID, CityName, Longitude, Latitude FROM citylocation WHERE CityName = '$cityNameTwo'");
    $row = mysql_fetch_row($result1); 
    
    $coordTwo = new Coordinate($row[2], $row[3]);
    $cityTwo = new City($coordTwo, $row[1]);
    
    $distancaCalc = new DistanceCalculator();
    $distance = $distancaCalc->Calculate($cityOne, $cityTwo);
    echo $distance;
    }


