<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog`.
 */
class m161221_082543_create_catalog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(55)->notNull()->defaultValue(""),
            'user_id'=>$this->integer(11)->notNull(),
            'add_time'=>$this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog');
    }
}
