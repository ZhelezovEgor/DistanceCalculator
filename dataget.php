<?php

//Извлекаем из базы данные о городах


    mysql_connect('localhost','root');
    mysql_select_db('distancecalculator'); 
    
    
    mysql_query("SET NAMES 'utf8'"); 
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
    mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
    $result1 =  mysql_query('SELECT CityID, CityName, Longitude, Latitude FROM citylocation ORDER BY CityName');
  
     
    
    
        $xml = new XMLWriter();
        $xml->openMemory(); //использование памяти для вывода строки
        $xml->startDocument(); //установка версии XML в первом теге документа
        
        //Сохраняем данные в формате xml
    while($row = mysql_fetch_row($result1))
    {
        $xml->startElement("City");

        $xml->startElement("CityName");
        $xml->text($row[1]);
        $xml->endElement();
        
        $xml->startElement("Longitude");
        $xml->text($row[2]);
        $xml->endElement(); 
        
        $xml->startElement("Latitude");
        $xml->text($row[3]);
        $xml->endElement();
        
        $xml->endElement(); //закрытие корневого элемента   
    
    }
    
    $xml->endDocument();
    echo $xml->flush();
    

    