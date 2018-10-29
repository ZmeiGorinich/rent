<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$script = <<< JS
        var val_select = $('#createequipmentform-category').val();             
        $('[data-id-block="' + val_select + '"]').fadeIn();
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>


<div class="post-default-index">

    <h1>Добавление Техники</h1>

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'picture')->fileInput()->label('Фото'); ?>

    <?php echo $form->field($model, 'name')->label('Заголовок'); ?>

    <?php echo $form->field($model, 'price')->label('Цена'); ?>

    <?php// echo $form->field($model, 'min_order')->label('Мин. срок аренды (Часы)'); ?>

    <?php// echo $form->field($model, 'region')->label('Область'); ?>

    <?php echo $form->field($model, 'district')->label('Район'); ?>

    <?php echo $form->field($model, 'height')->label('Высота агрегата'); ?>

    <?php echo $form->field($model, 'width')->label('Ширина агрегата'); ?>

    <?php echo $form->field($model, 'length')->label('Длина агрегата'); ?>

    <?php echo $form->field($model, 'weight')->label('Вес агрегата'); ?>

    <?php echo $form->field($model, 'description')->label('Описание')->textarea(); ?>

<!--    <div id="type" style="display: none;">-->
<!--        --><?php //echo $form->field($model, 'type')->label('Тип техники')->dropDownList([
//            'construction' => 'Строительная',
//            //'construction' => 'Строительная',
//            //'municipal' => 'Комунальная',
//            //'agricultural' => 'Сельскохозяйственная',
//        ], ['onChange' => "doSelect(this,{'construction':'construction','agricultural':'agricultural',});"]); ?>
<!--    </div>-->

    <div id="construction">
        <?php echo $form->field($model, 'category')->label('Категория')->dropDownList([
            '0' => 'Выберите',
            '1' => 'Автовышки',
            '2' => 'Автокраны',
            '3' => 'Краны-манипуляторы',
            '4' => 'Экскаваторы',
            '5' => 'Экскаваторы-погрузчики',
            '6' => 'Бульдозеры',
            '7' => 'Гидромолоты',
            '8' => 'Бетононасосы',
            '9' => 'Фронтальный погрузчик',
            '10' => 'Автобетоносмесители',
            '11' => 'Компрессоры',
            '12' => 'Генераторы',
            '13' => 'Самосвалы',
            '14' => 'Катки',
        ], ['onChange' => "doSelect(this,{
                                    '1':'aerial_platform','2':'truck_cranes',
                                    '3':'cranes_manipulators','4':'excavators',
                                    '5':'backhoe_loaders','6':'bulldozers',
                                    '7':'hammers','8':'concrete_pump',
                                    '9':'front_loader','10':'truck_mixers',
                                    '11':'compressors','12':'generators',
                                    '13':'dumpers','14':'road_rollers',});"]); ?>
    </div>

    <div id="municipal" style="display: none;">
        <?php /*echo $form->field($model, 'category3')->label('Категория')->dropDownList([
        '0' => 'Выберите',
        '1' => 'Автовышки',
        '2' => 'Автокраны',
        '3' => 'Краны-манипуляторы',
    ], ['onChange' => "doSelect(this,{
                                    '1':'construction1','2':'truck_cranes',
                                    '3':'cranes_manipulators','4':'excavators',});"]);*/ ?>
    </div>


    <div id="agricultural" style="display: none;">
        <?php /*echo $form->field($model, 'category2')->label('Категория')->dropDownList([
        '0' => 'Выберите',
        '1' => 'Тракторы',
        '2' => 'Комбайны',
        '3' => 'Кормоуборочные комбайны',
        '4' => 'Почвообрабатывающая техника',
        '5' => 'Сеялки зерновые, посадочная техника',
        '6' => 'Сенозаготовительная техника',
        '7' => 'Опрыскиватели',
        '8' => 'Самоходные опрыскиватели',
        '9' => 'Жатки и адаптеры',
    ], ['onChange' => "doSelect(this,{
                                    '1':'agricultural1','2':'agricultural2',
                                    '3':'agricultural3','4':'agricultural4',
                                    '5':'agricultural5','6':'agricultural6',
                                    '7':'agricultural7','8':'agricultural8',
                                    '9':'agricultural9',});"]);*/ ?>
    </div>


    <div id="block-construction">

        <div id="aerial_platform" class="row" style="display: none;" data-id-block="1">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_aerial_platform')
                    ->label(Yii::t('rent_construction_view', 'model_aerial_platform')); ?>
                <?php echo $form->field($model, 'lifting_height')
                    ->label(Yii::t('rent_construction_view', 'lifting_height')); ?>
                <?php echo $form->field($model, 'lifting_capacity_cradle')
                    ->label(Yii::t('rent_construction_view', 'lifting_capacity_cradle')); ?>
                <?php echo $form->field($model, 'number_cradle')
                    ->label(Yii::t('rent_construction_view', 'number_cradle')); ?>
            </div>
        </div>

        <div id="truck_cranes" class="row" style="display: none;" data-id-block="2">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_truck_cranes')
                    ->label(Yii::t('rent_construction_view', 'model_truck_cranes')); ?>
                <?php echo $form->field($model, 'lifting_capacity')
                    ->label(Yii::t('rent_construction_view', 'lifting_capacity')); ?>
                <?php echo $form->field($model, 'length_boom')
                    ->label(Yii::t('rent_construction_view', 'length_boom')); ?>
                <?php echo $form->field($model, 'boom_extension_length')
                    ->label(Yii::t('rent_construction_view', 'boom_extension_length')); ?>
                <?php echo $form->field($model, 'maximum_reach_boom')
                    ->label(Yii::t('rent_construction_view', 'maximum_reach_boom')); ?>
            </div>
        </div>

        <div id="cranes_manipulators" class="row" style="display: none;" data-id-block="3">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_cranes_manipulators')
                    ->label(Yii::t('rent_construction_view', 'model_cranes_manipulators')); ?>
                <?php echo $form->field($model, 'car_load_capacity')
                    ->label(Yii::t('rent_construction_view', 'car_load_capacity')); ?>
                <?php echo $form->field($model, 'boom_outreach')
                    ->label(Yii::t('rent_construction_view', 'boom_outreach')); ?>
                <?php echo $form->field($model, 'crane_lifting_capacity')
                    ->label(Yii::t('rent_construction_view', 'crane_lifting_capacity')); ?>
                <?php echo $form->field($model, 'dimensions_platform')
                    ->label(Yii::t('rent_construction_view', 'dimensions_platform')); ?>
            </div>
        </div>

        <div id="excavators" class="row" style="display: none;" data-id-block="4">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_excavators')
                    ->label(Yii::t('rent_construction_view', 'model_excavators')); ?>
                <?php echo $form->field($model, 'bucket_capacity')
                    ->label(Yii::t('rent_construction_view', 'bucket_capacity')); ?>
                <?php echo $form->field($model, 'radius_digging')
                    ->label(Yii::t('rent_construction_view', 'radius_digging')); ?>
                <?php echo $form->field($model, 'kinematic_depth_digging')
                    ->label(Yii::t('rent_construction_view', 'kinematic_depth_digging')); ?>
                <?php echo $form->field($model, 'discharge_height')
                    ->label(Yii::t('rent_construction_view', 'discharge_height')); ?>
            </div>
        </div>

        <div id="backhoe_loaders" class="row" style="display: none;" data-id-block="5">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_backhoe_loaders')
                    ->label(Yii::t('rent_construction_view', 'model_backhoe_loaders')); ?>
                <?php echo $form->field($model, 'bucket_capacity_excavator')
                    ->label(Yii::t('rent_construction_view', 'bucket_capacity_excavator')); ?>
                <?php echo $form->field($model, 'digging_depth_excavator')
                    ->label(Yii::t('rent_construction_view', 'digging_depth_excavator')); ?>
                <?php echo $form->field($model, 'bucket_capacity_loader')
                    ->label(Yii::t('rent_construction_view', 'bucket_capacity_loader')); ?>
                <?php echo $form->field($model, 'unloading_height_loader')
                    ->label(Yii::t('rent_construction_view', 'unloading_height_loader')); ?>
            </div>
        </div>

        <div id="bulldozers" class="row" style="display: none;" data-id-block="6">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_bulldozers')
                    ->label(Yii::t('rent_construction_view', 'model_bulldozers')); ?>
                <?php echo $form->field($model, 'power_kwt')
                    ->label(Yii::t('rent_construction_view', 'power_kwt')); ?>
                <?php echo $form->field($model, 'blade_width')
                    ->label(Yii::t('rent_construction_view', 'blade_width')); ?>
                <?php echo $form->field($model, 'blade_height')
                    ->label(Yii::t('rent_construction_view', 'blade_height')); ?>
                <?php echo $form->field($model, 'max_pulling_force')
                    ->label(Yii::t('rent_construction_view', 'max_pulling_force')); ?>
            </div>
        </div>

        <div id="hammers" class="row" style="display: none;" data-id-block="7">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_hammers')
                    ->label(Yii::t('rent_construction_view', 'model_hammers')); ?>
                <?php echo $form->field($model, 'hydraulic_breaker_brand')
                    ->label(Yii::t('rent_construction_view', 'hydraulic_breaker_brand')); ?>
                <?php echo $form->field($model, 'impact_energy')
                    ->label(Yii::t('rent_construction_view', 'impact_energy')); ?>
                <?php echo $form->field($model, 'mass_hydraulic_breaker')
                    ->label(Yii::t('rent_construction_view', 'mass_hydraulic_breaker')); ?>
                <?php echo $form->field($model, 'hammer_beat_frequency')
                    ->label(Yii::t('rent_construction_view', 'hammer_beat_frequency')); ?>
            </div>
        </div>

        <div id="concrete_pump" class="row" style="display: none;" data-id-block="8">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_concrete_pump')
                    ->label(Yii::t('rent_construction_view', 'model_concrete_pump')); ?>
                <?php echo $form->field($model, 'max_theoretical_produce')
                    ->label(Yii::t('rent_construction_view', 'max_theoretical_produce')); ?>
                <?php echo $form->field($model, 'max_pressure_concrete')
                    ->label(Yii::t('rent_construction_view', 'max_pressure_concrete')); ?>
                <?php echo $form->field($model, 'max_delivery_height')
                    ->label(Yii::t('rent_construction_view', 'max_delivery_height')); ?>
                <?php echo $form->field($model, 'max_feed_range')
                    ->label(Yii::t('rent_construction_view', 'max_feed_range')); ?>
                <?php echo $form->field($model, 'pump_volume_concrete_mixer')
                    ->label(Yii::t('rent_construction_view', 'pump_volume_concrete_mixer')); ?>
                <?php echo $form->field($model, 'width_car_expanded_form')
                    ->label(Yii::t('rent_construction_view', 'width_car_expanded_form')); ?>
                <?php echo $form->field($model, 'height_working_condition')
                    ->label(Yii::t('rent_construction_view', 'height_working_condition')); ?>
            </div>
        </div>

        <div id="front_loader" class="row" style="display: none;" data-id-block="9">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_front_loader')
                    ->label(Yii::t('rent_construction_view', 'model_front_loader')); ?>
                <?php echo $form->field($model, 'bucket_cutting_edge_width')
                    ->label(Yii::t('rent_construction_view', 'bucket_cutting_edge_width')); ?>
                <?php echo $form->field($model, 'front_loader_bucket_capacity'
                )->label(Yii::t('rent_construction_view', 'front_loader_bucket_capacity')); ?>
                <?php echo $form->field($model, 'tipping_load')
                    ->label(Yii::t('rent_construction_view', 'tipping_load')); ?>
                <?php echo $form->field($model, 'operating_weight')
                    ->label(Yii::t('rent_construction_view', 'operating_weight')); ?>
                <?php echo $form->field($model, 'maximum_discharge_height')
                    ->label(Yii::t('rent_construction_view', 'maximum_discharge_height')); ?>
            </div>
        </div>

        <div id="truck_mixers" class="row" style="display: none;" data-id-block="10">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_truck_mixers')
                    ->label(Yii::t('rent_construction_view', 'model_truck_mixers')); ?>
                <?php echo $form->field($model, 'volume_concrete_mixer')
                    ->label(Yii::t('rent_construction_view', 'volume_concrete_mixer')); ?>
            </div>
        </div>

        <div id="compressors" class="row" style="display: none;" data-id-block="11">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_compressors')
                    ->label(Yii::t('rent_construction_view', 'model_compressors')); ?>
                <?php echo $form->field($model, 'power_compressors')
                    ->label(Yii::t('rent_construction_view', 'power_compressors')); ?>

            </div>
        </div>

        <div id="generators" class="row" style="display: none;" data-id-block="12">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_generators')
                    ->label(Yii::t('rent_construction_view', 'model_generators')); ?>
                <?php echo $form->field($model, 'power_generators')
                    ->label(Yii::t('rent_construction_view', 'power_generators')); ?>
            </div>
        </div>

        <div id="dumpers" class="row" style="display: none;" data-id-block="13">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_dumpers')
                    ->label(Yii::t('rent_construction_view', 'model_dumpers')); ?>
                <?php echo $form->field($model, 'dumpers_lifting_capacity')
                    ->label(Yii::t('rent_construction_view', 'dumpers_lifting_capacity')); ?>
                <?php echo $form->field($model, 'board_height')
                    ->label(Yii::t('rent_construction_view', 'board_height')); ?>
                <?php echo $form->field($model, 'bead_length')
                    ->label(Yii::t('rent_construction_view', 'bead_length')); ?>
            </div>
        </div>

        <div id="road_rollers" class="row" style="display: none;" data-id-block="14">
            <div class="col-lg-5">
                <?php echo $form->field($model, 'model_road_rollers')
                    ->label(Yii::t('rent_construction_view', 'model_road_rollers')); ?>
                <?php echo $form->field($model, 'working_width')
                    ->label(Yii::t('rent_construction_view', 'working_width')) ?>
            </div>
        </div>
    </div>

    <div id="block-agricultural">

        <div id="agricultural1" class="row" style="display: none;">
        </div>

        <div id="agricultural2" class="row" style="display: none;">
        </div>

        <div id="agricultural3" class="row" style="display: none;">
        </div>

        <div id="agricultural4" class="row" style="display: none;">
        </div>

        <div id="agricultural5" class="row" style="display: none;">
        </div>

        <div id="agricultural6" class="row" style="display: none;">
        </div>

        <div id="agricultural7" class="row" style="display: none;">
        </div>

        <div id="agricultural8" class="row" style="display: none;">
        </div>

        <div id="agricultural9" class="row" style="display: none;">
        </div>
    </div>


    <?php echo Html::submitButton('Create'); ?>

    <?php ActiveForm::end(); ?>
</div>


<script type="text/javascript">
    function doSelect(object, elements) {
        var element = elements[object.value];

        for (i in elements)
            document.getElementById(elements[i]).style.display = 'none';

        if (element)
            document.getElementById(element).style.display = 'block';
    }


</script>
