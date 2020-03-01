<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $introtext
 * @property string $content
 * @property string $img
 * @property string $createdon
 * @property string $authors
 * @property int $article
 * @property string $status
 * @property int $pages
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id', 'pages'], 'integer'],
            [['content', 'introtext'], 'string'],
            [['title', 'img', 'createdon', 'authors', 'status', 'article'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Идентификатор категории',
            'title' => 'Заголовок',
            'introtext' => 'Краткое описание',
            'content' => 'Контент',
            'img' => 'Изображение',
            'createdon' => 'Дата создания',
            'authors' => 'Авторы',
            'article' => 'Артикл',
            'status' => 'Статус публикации',
            'pages' => 'Количество страниц',
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
