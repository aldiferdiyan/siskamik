<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id
 * @property string $nim
 * @property string $bulan
 * @property int $jumlah_bayar
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim', 'bulan', 'jumlah_bayar'], 'required'],
            [['bulan'], 'safe'],
            [['jumlah_bayar'], 'integer'],
            [['nim'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'bulan' => 'Bulan',
            'jumlah_bayar' => 'Jumlah Bayar',
        ];
    }
    public function getMahasiswa()
    {
        return $this->hasOne(MataKuliah::className(), ['nim' => 'nim']);
    }
}
