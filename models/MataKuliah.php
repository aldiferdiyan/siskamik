<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property int $id
 * @property string $nama_mata_kuliah
 * @property int $jumlah_sks
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mata_kuliah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_mata_kuliah', 'jumlah_sks'], 'required'],
            [['jumlah_sks'], 'integer'],
            [['nama_mata_kuliah'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'jumlah_sks' => 'Jumlah Sks',
        ];
    }
}
