<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m240126_141916_seed_users
 */
class m240126_141916_seed_users extends Migration
{
    public array $usersData = [
        ['name' => 'Ion', 'age' => 24],
        ['name' => 'Maria', 'age' => 18],
        ['name' => 'Andrei', 'age' => 45],
        ['name' => 'Oleg', 'age' => 31],
        ['name' => 'Denis', 'age' => 25],
        ['name' => 'Ana', 'age' => 19]
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->usersData as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->age = $user['age'];
            $newUser->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->usersData as $user) {
            $dbUser = User::find()->where($user)->one();
            $dbUser->delete();
        }
    }
}
