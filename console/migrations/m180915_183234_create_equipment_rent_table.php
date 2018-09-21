<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment_rent`.
 */
class m180915_183234_create_equipment_rent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('equipment_rent', [
            'id' => $this->primaryKey(),
            'author_id'=>$this->integer(),
            'name'=>$this->string(),

            'type'=>$this->string(),
            'category'=>$this->string(),

            'filename'=>$this->string(),

            'views'=>$this->integer(),

            'price'=>$this->string(),
            'min_order'=>$this->string(),

            'description'=>$this->text(),

            'region'=>$this->string(),
            'district'=>$this->string(),

            'height'=>$this->string(),
            'length'=>$this->string(),
            'width'=>$this->string(),
            'weight'=>$this->string(),

            'feature1'=>$this->string(),
            'feature2'=>$this->string(),
            'feature3'=>$this->string(),
            'feature4'=>$this->string(),
            'feature5'=>$this->string(),
            'feature6'=>$this->string(),
            'feature7'=>$this->string(),
            'feature8'=>$this->string(),
            'feature9'=>$this->string(),
            'feature10'=>$this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('equipment_rent');
    }
}
