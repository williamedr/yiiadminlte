<?php

use yii\db\Migration;

class m250822_021114_create_table_branches extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // MySQL specific table options for InnoDB
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

		$this->createTable('{{%branches}}', [
			'id' => $this->primaryKey(),
			'company_id' => $this->integer(),
			'name' => $this->string(100)->notNull(),
			'status' => "ENUM('active', 'inactive') NOT NULL DEFAULT 'active'",
			'created_at' => $this->integer()->notNull(),
		], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m250822_021114_create_table_branches cannot be reverted.\n";

        $this->dropForeignKey(
            'fk_branches_company_id',
            '{{%branches}}'
        );

        $this->dropIndex(
            'idx_branches_company_id',
            '{{%branches}}'
        );

        $this->dropTable('{{%branches}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250822_021114_create_table_branches cannot be reverted.\n";

        return false;
    }
    */
}
