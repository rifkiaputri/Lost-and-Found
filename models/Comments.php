<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $username
 * @property string $komentar
 * @property string $tanggal
 * @property integer $rank
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'username', 'komentar'], 'required'],
            [['post_id', 'rank'], 'integer'],
            [['komentar'], 'string'],
            [['tanggal'], 'safe'],
            [['username'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'username' => 'Username',
            'komentar' => 'Komentar',
            'tanggal' => 'Tanggal',
            'rank' => 'Rank',
        ];
    }
}
