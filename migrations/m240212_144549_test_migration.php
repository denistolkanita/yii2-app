<?php

use yii\db\Migration;

/**
 * Class m240212_144549_test_migration
 */
class m240212_144549_test_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test_table', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'active' => $this->boolean(),
        ]);

        $this->insert('test_table', [
            'id' => 10,
            'name' => 'Ivan',
            'active' => 1,
        ]);
        $this->renameTable('test_table', 'test_table_renamed');
        $this->addColumn('test_table_renamed', 'new-column1', 'string');
        $this->addColumn('test_table_renamed', 'new-column2', 'string');
        $this->addColumn('test_table_renamed', 'new-column3', 'string');
        $this->dropColumn('test_table_renamed', 'new-column3');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test_table');
    }
}
