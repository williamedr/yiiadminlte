<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250821_212746_create_user_table extends Migration
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

		$this->createTable('{{%user}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string(80)->notNull()->unique(),
			'email' => $this->string(80)->notNull()->unique(),
			'first_name' => $this->string(50)->notNull(),
			'last_name' => $this->string(50)->notNull(),
			'role_id' => $this->integer()->notNull()->defaultValue(2),
			'status' => $this->smallInteger()->notNull()->defaultValue(1),
			'password_hash' => $this->string()->notNull(),
			'password_reset_token' => $this->string(),
			'verification_token' => $this->string()->defaultValue(null),
			'auth_key' => $this->string(32)->notNull(),
			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		], $tableOptions);

        $this->insert('{{%user}}', [
			'username' => 'admin',
			'email' => 'admin@example.com',
			'first_name' => 'Admin',
			'last_name' => 'Admin',
			'role_id' => 1,
			'status' => 1,
			'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
			'auth_key' => Yii::$app->security->generateRandomString(),
			'created_at' => 0,
			'updated_at' => 0,
		]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
		$this->dropForeignKey(
            'fk_user_role_id',
            '{{%user}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            'idx_user_role_id',
            '{{%user}}'
        );

        $this->dropTable('{{%user}}');
    }
}
