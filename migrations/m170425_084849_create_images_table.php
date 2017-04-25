<?php

use yii\db\Migration;

/**
 * Handles the creation for table `images`.
 */
class m170425_084849_create_images_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'title' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('images');
    }
}
