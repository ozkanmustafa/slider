<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180428_123406_slider
 */
class m180428_153022_slider extends Migration
{
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('on update current_timestamp'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            //'updated_at' => 'timestamp on update current_timestamp',
            //'created_at' => $this->dateTime()->notNull(),
        ]);
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
        $this->dropTable('slider');
        $this->dropTable('slide');
    }
}
