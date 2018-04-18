<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Jadwal".
 *
 * @property int $id
 * @property string $id_matkul
 * @property string $nim
 * @property string $hari
 * @property string $mulai
 * @property string $selesai
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matkul', 'nim', 'hari', 'mulai', 'selesai'], 'required'],
            [['mulai', 'selesai'], 'safe'],
            [['id_matkul'], 'string', 'max' => 5],
            [['nim'], 'string', 'max' => 25],
            [['hari'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_matkul' => 'Id Matkul',
            'nim' => 'Nim',
            'hari' => 'Hari',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
        ];
    }


    # has one ke table matkul
    # getMatkul .. untuk pemanggilan cuma di panggil matkul
    # misal :
    #   $jadwal = new Jadwal();
    #   echo $jadwal->matkul->nama_mata_kuliah;
    #
    public function getMatkul()
    {
        return $this->hasOne(MataKuliah::className(), ['id' => 'id_matkul']);
    }

    public function getMahasiswa()
    {
        return $this->hasOne(MataKuliah::className(), ['nim' => 'nim']);
    }



}
