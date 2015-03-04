<form id="frmSearch" name="frmSearch" class="form-inline" action="rentals/search" method="GET" >
    <div class="form-group">
        <label class="" for="exampleInputEmail2"> Find a / ค้นหา </label>
        <select name="proptype" class="form-control">
            <option value="1">room</option>
            <option value="2">property</option>
        </select>
        <?php
        $ptc = new APIPropertyTypeController();
        $pts = $ptc->getAll()->sortBy('PropertyTypeNameEN');
        $ptsarray = [];
        $pts->each(function($type) use (&$ptsarray) {
            //array_push($ptsarray, $type->ID => $type->PropertyTypeNameEN);
            $ptsarray[$type->ID] = sprintf("%s / %s", $type->PropertyTypeNameEN, $type->PropertyTypeNameTH);
        });
        echo Form::label('proptype', 'Find a / ค้นหา', ['id' => 'lbPropType', 'name' => 'lbPropType', 'class' => '']);
        echo Form::select('proptype', $ptsarray, 'S', array('class' => 'form-control'));
        ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2"> near / ใกล้ </label>
        <select name="near" class="form-control">
            <option value="1">Phuket / ภูเก็ต</option>
            <option value="2">Hatyai / หาดใหญ่</option>
            <option value="3">Trang / ตรัง</option>
            <option value="4">Suratthani / สุราษฎร์ธานี</option>
            <option value="5">Pattani / ปัตตานี</option>
        </select>
    </div>
    <div class="form-group">
        <label class="" for="fee"> for under / ค่าเช่าไม่เกิน </label>
        <input name="fee" type="number" class="form-control" id="fee" placeholder="" value="1000" >
    </div>
    <div class="form-group">
        <label class="" for="exampleInputPassword2"> Baht per month / บาทต่อเดือน </label>
    </div>
    <button type="submit" class="btn btn-default"> Search </button>
</form>


