<?php

namespace app\models;
use app\models\Admin;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $nama;
    public $authKey;
    public $accessToken;
    public $role;

    public static function findIdentity($id)
    {
      //mencari user login berdasarkan IDnya dan hanya dicari 1.
      $user = Admin::findOne($id);
      if($user != null){
        return new static($user);
      }
      return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      //mencari user login berdasarkan username dan hanya dicari 1.
      $username = Admin::find()->where(['username'=>$username])->one();

      if($username != null){
        return new static($username);
      }
      return null;
    }


    public static function findIdentityByAccessToken($token, $type = null)
       {
           //mencari user login berdasarkan accessToken dan hanya dicari 1.
           $user = Login::find()->where(['accessToken'=>$token])->one();
           if($user != null){
               return new static($user);
           }
           return null;
       }

       public function getAuthKey()
 {
     return $this->authKey;
 }



     public function validateAuthKey($authKey)
     {
         return $this->authKey === $authKey;
     }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return $this->password === $password;
    }
}
