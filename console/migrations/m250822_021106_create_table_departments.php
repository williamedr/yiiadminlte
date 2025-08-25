<?php

use yii\db\Migration;

class m250822_021106_create_table_departments extends Migration
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

		$this->createTable('{{%departments}}', [
			'id' => $this->primaryKey(),
			'branch_id' => $this->integer(),
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
        echo "m250822_021106_create_table_departments cannot be reverted.\n";

        $this->dropForeignKey(
            'fk_departments_company_id',
            '{{%departments}}'
        );

        $this->dropIndex(
            'idx_departments_company_id',
            '{{%departments}}'
        );

        $this->dropForeignKey(
            'fk_departments_branch_id',
            '{{%departments}}'
        );

        $this->dropIndex(
            'idx_departments_branch_id',
            '{{%departments}}'
        );

        $this->dropTable('{{%departments}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250822_021106_create_table_departments cannot be reverted.\n";

        return false;
    }
    */
}
