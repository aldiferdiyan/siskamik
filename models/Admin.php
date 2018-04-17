<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nama
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama'], 'required'],
            [['username', 'nama'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
        ];
    }
}
