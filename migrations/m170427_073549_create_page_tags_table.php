<?php

use yii\db\Migration;

/**
 * Handles the creation for table `page_tags`.
 */
class m170427_073549_create_page_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page_tags', [
            'page_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull()
        ]);

        $this->addPrimaryKey('pk_page_tags', 'page_tags', ['page_id', 'tag_id']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page_tags');
    }
}
