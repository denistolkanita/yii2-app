<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Articles model
 */
class Articles extends ActiveRecord
{
    public function getFullTitle($title): string
    {
        return 'Post ' . $title;
    }

    public function completeLikes(int $likes): string
    {
        return $likes . ($likes > 1 ? ' likes' : ' like');
    }

    public function completeViews(int $views): string
    {
        return $views . ($views > 1 ? ' views' : ' view');
    }

    public function getShortText(string $text): string
    {
        $needToCut = strlen($text) > 30;

        if ($needToCut) {
            $text = substr($text, 0, 30);
            while (substr($text, -1) !== ' ') {
                $text = substr($text, 0, -1);
            }
        }

        return substr($text, 0, -1) . ($needToCut ? '...' : '');
    }
}