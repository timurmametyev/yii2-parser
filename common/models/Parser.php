<?php


namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use common\models\Category;
use common\models\Book;
use igogo5yo\uploadfromurl\UploadFromUrl;

class Parser extends Model {

    public $path;
    public $books_success = 0;
    public $books_error = 0;
    public $books_duplicate = 0;
    public $categories_success = 0;
    public $categories_error = 0;
    public $categories_duplicate = 0;

    public function rules()
    {
        return [
            [['path'], 'required']
        ];
    }

    public function getArray($path) {
        $file = file_get_contents($path);
        $arr = Json::decode($file);
        return $arr;
    }

    public function create($arr) {
        $output = [];
        foreach ($arr as $item) {
            $parent = $this->createCategory($item['categories']);
            $date = $item['publishedDate']['$date'];
            $authors = $this->getAuthors($item['authors']);
            $image = 'default.jpg'; // $this->uploadImage($item['thumbnailUrl']);
            $output[] = $this->createBook($item, $parent, $date, $authors, $image);
        }
        $output['books_success'] = $this->books_success;
        $output['books_error'] = $this->books_error;
        $output['books_duplicate'] = $this->books_duplicate;
        $output['categories_success'] = $this->categories_success;
        $output['categories_error'] = $this->categories_error;
        $output['categories_duplicate'] = $this->categories_duplicate;
        return $output;
    }

    protected function createCategory($arr) {
        $parent = (int) 0;
        if (empty($arr)) {
            $category = Category::findOne(['title' => 'Новинки', 'parent' => $parent]);
            if (empty($category)) {
                $cat = new Category();
                $cat->title = 'Новинки';
                $cat->parent = $parent;
                $cat->save();
                $parent = $cat->id;
                $this->categories_success++;
                return $parent;
            }
            $parent = $category->id;
            return $parent;
        }
        foreach ($arr as $idx => $item) {
            $category = Category::findOne(['title' => $item, 'parent' => $parent]);
            if (empty($category)) {
                if (empty($item)) return $parent;
                $cat = new Category();
                $cat->title = $item;
                $cat->parent = $parent;
                $cat->save();
                $parent = $cat->id;
                $this->categories_success++;
            } else {
                $parent = $category->id;
                $this->categories_duplicate++;
            }
        }
        return $parent;
    }

    protected function getAuthors($arr) {
        $authors = '';
        foreach ($arr as $item) {
            if (!empty($item)) {
                $authors .= $item . ', ';
            }
        }
        return $authors;
    }

    public function getDate($arr) {
        $date = '';
        foreach ($arr as $item) {
            if (!empty($item)) {
                $date .= $item;
            }
        }
        return $date;
    }

    protected function uploadImage($url) {
        if (empty($url)) return 'default.jpg';

        do {
            $name = uniqid('img_') . '.jpg';
            $path = Yii::getAlias('@frontend/web/images/books/') . $name;
        }

        while (file_exists($path));
        $file = UploadFromUrl::initWithUrl($url);
        if ($file->saveAs($path)) {
            return $name;
        } else {
            return 'default.jpg';
        }
    }

    protected function createBook($item, $parent, $date, $authors, $image = 'default.jpg') {
        $str = [];
        $check = Book::findOne(['title' => $item['title'], 'category_id' => $parent]);
        if (empty($check)) {
            $model = new Book();
            $model->category_id = $parent;
            $model->title = $item['title'];
            $model->introtext = $item['shortDescription'] ? $item['shortDescription'] : '';
            $model->content = $item['longDescription'] ? $item['longDescription'] : '';
            $model->img = $image;
            $model->createdon = $date ? $date : '';
            $model->authors = $authors ? $authors :'';
            $model->article = $item['isbn'] ? $item['isbn'] :'0';
            $model->status = $item['status'];
            $model->pages = $item['pageCount'];
            if ($model->save()) {
                $this->books_success++;
                $str['success'] = $model->title . ' - запись создана';
            } else {
                $this->books_error++;
                $str['error'] .= $model->title . ' - ' . print_r($model->errors, true);
            }
        } else {
            $this->books_duplicate++;
            $str['duplicate'] .= $item['title'] . ' - запись существует';
        }
        return $str;
    }

}