<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180426_080450_slide
 */
class m180428_153713_slide extends Migration
{
    public function up()
    {
        $this->createTable('slide', [
            'id' => $this->primaryKey(),
            'slideId' => $this->integer()->notNull(),
            'imageContent' => $this->text(),
            'caption' => $this->string(),
            'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('on update current_timestamp'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addforeignKey('fk_slide_slideId','slide','slideId','slider','id'); 
    }

    public function down()
    {
        $this->dropForeignKey('fk_slide_slideId','slide');
        $this->dropTable('slide');
    }
}
