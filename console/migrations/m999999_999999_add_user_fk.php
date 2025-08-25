<?php

use yii\db\Migration;

class m999999_999999_add_user_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250821_235035_add_user_fk cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $table = '{{%user}}';

        $this->createIndex(
            'idx_user_role_id',
            $table,
            'role_id'
        );

        $this->addForeignKey(
            'fk_user_role_id',
            $table,
            'role_id',
            '{{%role}}',
            'id'
        );

    }

    public function down()
    {
        echo "m250821_235035_add_user_fk cannot be reverted.\n";

        return false;
    }

}
