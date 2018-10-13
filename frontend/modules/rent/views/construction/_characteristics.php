<div class="col-lg-4">
    <?php foreach ($characteristics as $key => $characteristic):?>
        <div class="row">
            <?php echo Yii::t('rent_construction_view', "$key"), " ", "$characteristic"; ?>
        </div>
    <?php endforeach;?>
</div>