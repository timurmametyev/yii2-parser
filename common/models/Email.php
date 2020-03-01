<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $message
 * @property string $phone
 */
class Email extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'message', 'name', 'phone'], 'required'],
            ['email', 'email'],
            [['message'], 'string'],
            [['email', 'name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email адрес',
            'name' => 'Имя отправителя',
            'message' => 'Сообщение',
            'phone' => 'Телефон',
            'verifyCode' => 'Verification Code',
        ];
    }

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
