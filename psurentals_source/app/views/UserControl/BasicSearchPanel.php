<form id="frmSearch" name="frmSearch" class="form-inline" action="/rentals/search" method="GET" >
    <?php
    /* Data Preparation */
    try {
        $config = new APIConfigurationController();

        // PropertyType
        $pts = (new APIPropertyTypeController())->getAll()->sortBy('PropertyTypeNameEN');
        $ptsarray = [];
        $pts->each(function($type) use (&$ptsarray) {
            //array_push($ptsarray, $type->ID => $type->PropertyTypeNameEN);
            $ptsarray[$type->ID] = sprintf("%s / %s", $type->PropertyTypeNameEN, $type->PropertyTypeNameTH);
        });

        // Campus
        $campuses = (new APICampusController())->getAll()->sortByDesc('ShortNameEN');
        $defaultCampusID = $config->getDefaultCampusID();
        $defaultCampusID = empty($defaultCampusID) ? -1 : $defaultCampusID;

        $defaultFeeValue = (int) 1000;
        $defaultOrder = $config->getDefaultSearchRentalOrder();
    } catch (Exception $exc) {
        //echo $exc->getTraceAsString();
        $ptsarray = [];
        $campuses = [];
        $defaultCampusID = -1;
        ?>
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Basic Search:</span>
            Cannot connect to the database.<br /> ?>
            <?= $exc->getMessage(); ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <div style="display: inline-block; vertical-align: middle;">
                    <!-- With Laravel Engine -->
                    <?= Form::label('proptype', 'Find a', ['id' => 'lbPropType', 'name' => 'lbPropType', 'class' => '']); ?>
                    <!--                    <br />-->

                </div>

                <div style="display: inline-block; vertical-align: middle;">
                    <?= Form::select('proptype', $ptsarray, '', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <div style="display: inline-block; vertical-align: middle;">
                    <label for="near"> near</label>
                    <!--                    <br />
                                        <label for="near"> ใกล้ </label>-->
                </div>
                <div style="display: inline-block; vertical-align: middle;">
                    <select name="near" class="form-control">
                        <?php
                        /* Treaditional PHP */
                        foreach ($campuses as $campus) {
                            ?>
                            <option value='<?= $campus->ID ?>' 
                                    <?= ((int) $campus->ID === (int) $defaultCampusID) ? "selected=selected" : "" ?>>
                                <?= sprintf("%s / %s", $campus->ShortNameEN, $campus->ShortNameTH); ?></option>;
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div style="display: inline-block; vertical-align: middle;">
                    <label class="" for="fee"> for under </label>
                    <!--                    <br />
                                        <label class="" for="fee"> ค่าเช่าไม่เกิน </label>-->
                </div>
                <div style="display: inline-block; vertical-align: middle;">
                    <input name="fee" type="number" class="form-control" 
                           id="fee" placeholder="" value="<?= $defaultFeeValue ?>" >
                </div>
                <div style="display: inline-block; vertical-align: middle;">
                    <label class=""> Baht per month</label>
                    <!--                    <br />
                                        <label>บาทต่อเดือน</label>-->
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" id="order" name="order" value="<?= $defaultOrder ?>">
            <button type="submit" class="btn btn-success"> Search </button>
        </div>
    </div>
    <?php ?>
</form>