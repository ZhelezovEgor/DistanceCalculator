

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css.css" />
        <script type='text/javascript' src='https://code.jquery.com/jquery.js'></script>
    </head>
    <body>
      
<script>
var $currentCity;
var $currentLongitude;
var $currentLatitude;


function getData(){
    
 //Добавляем названиями городов, которые были добавлены в базу но которых
 //еще нет в списках
 $.get("dataget.php", function(xml) {
         
   $(xml).find("CityName").each(
       function(index){

           //Если в выпадающем списке нет пункта с текущим названием города
           //добавляем его
           if(!$("option:contains('"+$(this).text()+"')").val()){
            $('#firstCity').append('<option>'+ $(this).text()+'</option>');
            $('#secondCity').append('<option>'+ $(this).text()+'</option>'); 
        }
        });
});
    
  
  }
  
function SearchCity()
{

  $city = $('#ChooseTextBox').val();
  
  //Выполняем запрос к Геокодер.Яндекс
  $.get(
  "https://geocode-maps.yandex.ru/1.x/",
  {
    apikey: 'b7897875-c261-4639-8c1d-7dac222116a2',
    geocode: $city,
    results: 1
  },
  onSearchCitySuccess
  );
  
} 
function onSearchCitySuccess(xml)
{    
  // Значение координат находятся внутри тега <pos>   
  $currentLongitude = $(xml).find('pos').text().split(' ')[0];
  $currentLatitude = $(xml).find('pos').text().split(' ')[1];
  //Название города находится внутри тега <text>
  $currentCity = $(xml).find('text').text();
  
  if(!$currentCity)
  {
      throw new Exception('Поиск не дал результатов. Неверно введено название города');
  }
  
  $('#SaveTextBox').val( $currentCity);
  $('#Longitude').val($currentLongitude);
  $('#Latitude').val($currentLatitude);
  
  //Переводим в угловые секунды,потому что данные в базе хранятся в угловых секундах
  $currentLongitude = $currentLongitude*3600;
  $currentLatitude = $currentLatitude*3600;

}
function AddCity()
{
    
   if($currentCity){ 
  //Сохраняем город в базу данных  
  
  $.get(
  "datasave.php",
  {
    cityName: $currentCity,
    longitude: $currentLongitude,
    latitude: $currentLatitude
  },
  onAddCitySuccess
  ); 
   }

}
function Calculate()
{
    //Получаем значение выбранного элемента выпадающего списка
    $cityNameOne = $("#firstCity option:selected").text();
    $cityNameTwo = $("#secondCity option:selected").text();

   // Делаем запрос на расчет расстояния меду городами
   $.get(
  "calculate.php",
  {
    cityNameOne: $cityNameOne,
    cityNameTwo: $cityNameTwo,
  },
  onCalculateSuccess
  );

}

function onCalculateSuccess(data)
{
   alert("Расстояние между городами: "+(data/1000)+" км");
}

function onAddCitySuccess(data)
{
    //После добавления города в базу
    //обновляем выпадающие списки
   getData();
}


</script>
        <div class="firstform">  
            <input maxlength="25" size="40" value="Введите город" id="ChooseTextBox">
            <button onclick="SearchCity()">Поиск</button>
        </div>
        <div class="secondform">  
            <input maxlength="25" size="40" value="Сохранить город" id="SaveTextBox">
            <input maxlength="25" size="40" value="Долгота" id="Longitude">
            <input maxlength="25" size="40" value="Широта" id="Latitude">
            <button onclick="AddCity()">Сохранить</button>
        </div>
        <div class="thirdform">
            
                <?php
                

              mysql_connect('localhost','root');
              mysql_select_db('distancecalculator'); 
    
    
               mysql_query("SET NAMES 'utf8'"); 
               mysql_query("SET CHARACTER SET 'utf8'");
               mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
               mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
               $result1 =  mysql_query('SELECT CityID, CityName, Longitude, Latitude FROM citylocation ORDER BY CityName');
                
               $str;
                //Заполняем выпадающие списки значениями из базы
                   while($row = mysql_fetch_row($result1))
                   {
                     $str.= "<option>" .$row[1] . "</option>";
                   }
                echo "<select id='firstCity' >"; 
                echo $str;
                echo "</select> ";
                echo "<select id='secondCity' >"; 
                echo $str;
                echo "</select> ";
                ?>
           <button onclick="Calculate()">Рассчитать</button>
           <div id="result"></div>
        </div>
       
     </body>
</html>  
<?php
 

 ?>