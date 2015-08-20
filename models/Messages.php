<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property string $dari
 * @property string $ke
 * @property string $tanggal
 * @property string $isi
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dari', 'ke', 'isi'], 'required'],
            [['tanggal'], 'safe'],
            [['isi'], 'string'],
            [['dari', 'ke'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dari' => 'Dari',
            'ke' => 'Ke',
            'tanggal' => 'Tanggal',
            'isi' => 'Isi',
        ];
    }
}
