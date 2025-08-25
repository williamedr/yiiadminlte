<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m250821_172302_create_role_table extends Migration
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

		$this->createTable('{{%role}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string(32)->notNull(),
			'slug' => $this->string(32)
		], $tableOptions);

		$this->insert('{{%role}}', [
			'name' => 'Admin',
			'slug' => 'admin'
		]);

		$this->insert('{{%role}}', [
			'name' => 'User',
			'slug' => 'user'
		]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		$this->dropTable('{{%role}}');
	}
}
