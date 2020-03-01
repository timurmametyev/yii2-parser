<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Родительская категория (default 0)',
            'title' => 'Заголовок',
        ];
    }

    public function getBooks() {
        return $this->hasMany(Book::className(), ['category_id' => 'id']);
    }

    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent']);
    }

    public function getChildren() {
        return $this->hasMany(self::className(), ['parent' => 'id']);
    }

    public function getCategory($id) {
        return self::findOne($id);
    }

    public function getCategoryBooks($id) {
        $ids = $this->getAllChildIds($id);
        $ids[] = $id;
        return Book::find()->where(['in', 'category_id', $ids])->all();
    }

    protected function getAllChildIds($id) {
        $children = [];
        $ids = $this->getChildIds($id);
        foreach ($ids as $item) {
            $children[] = $item;
            $c = $this->getAllChildIds($item);
            foreach ($c as $v) {
                $children[] = $v;
            }
        }
        return $children;
    }

    protected function getChildIds($id) {
        $children = self::find()->where(['parent' => $id])->asArray()->all();
        $ids = [];
        foreach ($children as $child) {
            $ids[] = $child['id'];
        }
        return $ids;
    }

}
