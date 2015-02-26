<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$configs = new ConfigurationAPIController();
$defaultCampus = $configs->getDefaultCampusID();
$listPerPage = $configs->getListPerPage();
$titleLenght = $configs->getLimitTitleLength();
$descLenght = $configs->getLimitDescriptionLength();

/*
 * ข้อมูลที่รับเข้ามาจะอยู่ภายใต้ตัวแปรชื่อ $rentals
 * เพื่อวนแสดง List ของ rentals
 */
foreach ($rentals as $rental) {
    ?>
    <span></span><br />   

    <div class="panel panel-default rentalList">
        <div class="panel-body">
            <div class="media">
                <!-- ไว้สำหรับเก็บข้อมูลของรายการนั้นๆ -->
                <input id="hrental<?= $rental->RentalID; ?>" type="hidden" value='<?= json_encode($rental) ?>' />

                <span class='rentalCode'><?= $rental->RentalID; ?></span>
                <a class="media-left cover" href="/detail">
                    <?php
                    /*
                     * Prepare URL for picture
                     */
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
                    <h4 class="media-heading"><a class="title" id="<?= $rental->RentalID ?>" href="/detail">
                            <?php
                            if (strlen($rental->Title) > $titleLenght) {
                                echo substr($rental->Title, 0, $titleLenght - 3) . "...";
                            } else
                                echo $rental->Title;
                            ?></a></h4>
                    <div class="monthlyfee">
                        <span class="monthlyfeefrom"><?= $rental->MonthlyRentalFeeFrom ?></span>
                        <?php
                        if ($rental->MonthlyRentalFeeFrom != $rental->MonthlyRentalFeeTo) {
                            echo '<span class="monthlyfeeto">' . $rental->MonthlyRentalFeeTo . '</span>';
                        }
                        ?>
                    </div>

                    <?php
                    if (strlen($rental->Details) > $descLenght) {
                        echo substr($rental->Details, 0, $descLenght - 3) . "...";
                    } else
                        echo $rental->Details;
                    ?>
                </div>
                <div id="status" class="status <?= $rental->Status ?>" style="display: none;">
                    <?= $rental->StatusNameEN . " / " . $rental->StatusNameTH ?></div>
            </div>
        </div>
    </div>


<?php }
?>

<script>
    $(function () {
        var userInfo = JSON.parse(localStorage.getItem("userInfo"));

        if (userInfo.isAuthentication) {
            $(".status").show();
        } else
            $(".status").hide();

        $(".title").click(selectRental(event));
        $("a.cover").click(selectRental(event));
        
        function selectRental(event) {
            event.preventDefault();
            var rental = $("#hrental" + $(this).attr('id'));
            localStorage.setItem("currentRental", rental.val());
            alert(JSON.parse(rental.val()).Title);
            window.location.href = $(this).attr('href');
        }
    });
</script>