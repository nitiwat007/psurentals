<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($rentals->find('RentalID' => 'cdbb4730-b71f-11e4-839b-6fb5eafd2fa8'));
//var_dump($configs);
//$titleLenght = 0;
/*
  foreach ($configs as $config) {

  switch ($config->KeyName) {
  case 'DefaultCampus':
  $defaultCampus = $config->KeyValue;
  echo $config->KeyName . $config->KeyValue;
  break;
  case 'ListPerPage':
  $listPerPage = $config->KeyValue;
  echo $config->KeyName . $config->KeyValue;
  break;
  case 'LimitTitleLength':
  $titleLenght = $config->KeyValue;
  echo $config->KeyName . $config->KeyValue;
  break;
  case 'LimitDescriptionLength':
  $descLenght = $config->KeyValue;
  echo $config->KeyName . $config->KeyValue;
  default:
  break;
  }
  } */
$configs = new ConfigurationAPIController();
$defaultCampus = $configs->getDefaultCampusID();
$listPerPage = $configs->getListPerPage();
$titleLenght = $configs->getLimitTitleLength();
$descLenght = $configs->getLimitDescriptionLength();

foreach ($rentals as $rental) {
    ?>
    <span></span><br />   

    <div class="panel panel-default rentalList">
        <div class="panel-body">
            <div class="media">
                <span class='rentalCode'><?= $rental->RentalID; ?></span>
                <a class="media-left" href="#">
                    <?php
                    $host = explode('/', $_SERVER['SERVER_PROTOCOL'])[0] . '://' . $_SERVER['HTTP_HOST'];
                    //$url =  $host . '/rentals/cover/' . $rental->RentalID;
                    //echo $url;
                    //$imgCover = file_get_contents($url) ;
                    //echo $imgCover;
                    //$imgPath = $host . "/psurentals_uploads/" . $imgCover;
                    $imgPath = $host . "/psurentals_uploads/" . $rental->Picture;
                    //echo $imgPath;
                    ?>
                    <img alt="" src='<?= $imgPath ?>' class='cover' >
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="/rentals/view/<?= $rental->RentalID ?>">
                            <?php
                            if (strlen($rental->Title) > $titleLenght) {
                                echo substr($rental->Title, 0, $titleLenght - 3) . "...";
                            } else
                                echo $rental->Title;
                            ?></a></h4>
                            <?php
                    if (strlen($rental->Details) > $descLenght) {
                        echo substr($rental->Details, 0, $descLenght - 3) . "...";
                    } else
                        echo $rental->Details;
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>


<?php }
?>
