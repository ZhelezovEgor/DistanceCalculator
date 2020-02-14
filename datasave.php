<?php
    //Сохраняем в базу данные 
    if(isset($_GET['cityName']))
    {

    mysql_connect('localhost','root');
    mysql_select_db('distancecalculator'); 
    
    
    mysql_query("SET NAMES 'utf8'"); 
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
    mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
    
    $cityName = $_GET['cityName'];
    $longitude = $_GET['longitude'];
    $latitude = $_GET['latitude'];
    
    
    echo $cityName;
    $result1 =  mysql_query("SELECT CityID, CityName, Longitude, Latitude FROM citylocation WHERE CityName = '$cityName'");
    
  
  if(!mysql_fetch_row($result1)){
       
      $datetime = date("Y-n-j H:i:s");
      $result = mysql_query("INSERT INTO citylocation ( CityName,Longitude,Latitude,DATETIME) VALUES ('$cityName','$longitude','$latitude','$datetime')");   
     
     echo 'ADDED';
   } 
   else{
    echo 'EXIST';
   }
    
 }