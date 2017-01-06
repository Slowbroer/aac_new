<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m161226_014604_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'content'=>$this->text()->notNull(),
            'user_id'=>$this->integer(11)->notNull(),
            'add_time'=>$this->integer(11),
            'is_show'=>$this->integer(1)->defaultValue(1),
            'ann_id'=>$this->integer(11)->notNull(),
            'level'=>$this->integer(5)->defaultValue(5),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
