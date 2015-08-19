<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $tipe
 * @property string $judul
 * @property string $username
 * @property string $tanggal
 * @property string $konten
 * @property string $foto_konten
 */
class Post extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe', 'judul', 'username', 'konten'], 'required'],
            [['tipe'], 'integer'],
            [['tanggal'], 'safe'],
            [['konten'], 'string'],
            [['judul'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 20],
            [['foto_konten'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipe' => 'Tipe',
            'judul' => 'Judul',
            'username' => 'Username',
            'tanggal' => 'Tanggal',
            'konten' => 'Konten',
            'foto_konten' => 'Foto Konten',
        ];
    }
}
