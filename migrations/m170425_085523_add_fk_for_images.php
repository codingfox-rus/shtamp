<?php

use yii\db\Migration;

class m170425_085523_add_fk_for_images extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_images_page_id', 'images', 'page_id', 'pages', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_images_page_id', 'images');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
