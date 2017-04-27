<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tags`.
 */
class m170427_073506_create_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tags');
    }
}
