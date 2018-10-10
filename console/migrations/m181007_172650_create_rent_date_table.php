<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rent_date`.
 */
class m181007_172650_create_rent_date_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rent_date', [
            'id' => $this->primaryKey(),
            'id_order' => $this->integer(),
            'id_tech' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rent_date');
    }
}
