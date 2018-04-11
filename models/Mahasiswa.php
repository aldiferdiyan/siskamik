<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $nim
 * @property string $password
 * @property string $nama_lengkap
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim', 'password', 'nama_lengkap'], 'required'],
            [['nim'], 'string', 'max' => 15],
            [['password', 'nama_lengkap'], 'string', 'max' => 25],
            [['nim'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
        ];
    }
}
