<?php

use app\models\Tags;
use app\models\User;
use yii\db\Migration;

/**
 * Class m240126_143638_seed_tags
 */
class m240126_143638_seed_tags extends Migration
{

    public array $tags = ['cats', 'dogs', 'birds', 'cars', 'colors'];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $userIds = array_map(fn($user) => $user->id, User::find()->select('id')->all());

        foreach ($this->tags as $tag) {
            $newTag = new Tags();
            $newTag->tag = $tag;
            $newTag->user_id = $userIds[array_rand($userIds)];

            $newTag->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Tags::deleteAll(['tag' => $this->tags]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240126_143638_seed_tags cannot be reverted.\n";

        return false;
    }
    */
}
