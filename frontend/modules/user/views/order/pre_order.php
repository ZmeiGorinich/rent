<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <?= $this->render('@app/modules/user/views/order/_menu') ?>
        </div>


        <div class="col-lg-10">
            <table class="table">
                <tr>
                    <td>Место работы</td>
                    <td>Агрегат</td>
                    <td>Цена</td>
                    <td>Дата начала</td>
                    <td>Дата окончания</td>
                    <td>Дата создания заявки</td>
                </tr>
                <?php foreach ($rents as $key => $rent):?>
                    <tr>
                        <td><?php echo $rent['location'];?></td>
                        <td><a href="/rent/equipment/equipment?id=<?php echo $rent['id_tech']?>"><?php echo $rent['name']?></a> </td>
                        <td><?php echo $rent['total']?></td>
                        <td><?php echo date("d.m.y", $rent['date_start'])?></td>
                        <td><?php echo date("d.m.y", $rent['date_finish'])?></td>
                        <td><?php echo date("d.m.y", $rent['created_at'])?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
