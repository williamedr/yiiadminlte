<?php

use yii\db\Migration;

class m250822_021054_create_table_companies extends Migration
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

		$this->createTable('{{%companies}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string(100)->notNull(),
			'email' => $this->string(100)->notNull(),
			'address' => $this->string(255)->notNull(),
			'status' => "ENUM('active', 'inactive') NOT NULL DEFAULT 'active'",
			'created_at' => $this->integer()->notNull(),
		], $tableOptions);
	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		echo "m250822_021054_create_table_companies cannot be reverted.\n";

		$this->dropTable('{{%companies}}');

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m250822_021054_create_table_companies cannot be reverted.\n";

		return false;
	}
	*/
}
