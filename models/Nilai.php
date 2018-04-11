<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai".
 *
 * @property int $id
 * @property string $mata_kuliah
 * @property int $nim
 * @property int $nilai
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mata_kuliah', 'nim', 'nilai'], 'required'],
            [['nim', 'nilai'], 'integer'],
            [['mata_kuliah'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mata_kuliah' => 'Mata Kuliah',
            'nim' => 'Nim',
            'nilai' => 'Nilai',
        ];
    }
}
