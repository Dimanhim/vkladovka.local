<?php
namespace app\models;

use himiklab\thumbnail\EasyThumbnailImage;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

class SearchForm extends Model
{
    public $request;

    public function rules()
    {
        return [
            ['request', 'required', 'message' => 'Строка поиска не может быть пустой'],
            ['request', 'string'],
        ];
    }
    public function getResults()
    {
        $result = [];
        if($things = Thing::find()->where(['like', 'name', $this->request])->all()) {
            foreach($things as $thing) {
                if($thing->rent) {
                    $result[] = [
                        'name' => $thing->name,
                        'image' => Yii::getAlias('@thing').'/'.$thing->img,
                        'link' => Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $thing->id]),
                        'category' => 'Сдано в аренду',
                    ];
                }
                $result[] = [
                    'name' => $thing->name,
                    'image' => Yii::getAlias('@thing').'/'.$thing->img,
                    'link' => Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $thing->id]),
                    'category' => 'Вещи',
                 ];
            }
        }
        if($reviews = Review::find()->where(['like', 'preview', $this->request])->orWhere(['like', 'content', $this->request])->all()) {
            foreach($reviews as $review) {
                $result[] = [
                    'name' => $review->preview,
                    'image' => '',
                    'link' => Yii::$app->urlManager->createUrl(['admin/review/view', 'id' => $review->id]),
                    'category' => 'Отзывы',
                ];
            }
        }
        if($storageItems = StorageItems::find()->where(['like', 'name', $this->request])->all()) {
            foreach($storageItems as $storageItem) {
                if(Storage::findOne($storageItem->storage_id)) {
                    $result[] = [
                        'name' => $storageItem->name,
                        'image' => '',
                        'link' => Yii::$app->urlManager->createUrl(['admin/storage/items', 'id' => $storageItem->storage_id]),
                        'category' => 'Заказы хранения',
                    ];
                }
            }
        }
        if($trendCities = TrendCity::find()->where(['like', 'city', $this->request])->all()) {
            foreach($trendCities as $trendCity) {
                $result[] = [
                    'name' => $trendCity->city,
                    'image' => $trendCity->images ? $trendCity->images[0]->fullLink : '',
                    'link' => Yii::$app->urlManager->createUrl(['admin/trend-city/view', 'id' => $trendCity->id]),
                    'category' => 'Тенденции в аренде',
                ];
            }
        }
        if($users = User::find()->where(['like', 'fio', $this->request])->orWhere(['like', 'passport', $this->request])->orWhere(['like', 'address', $this->request])->orWhere(['like', 'phone', $this->request])->all()) {
            foreach($users as $user) {
                $result[] = [
                    'name' => $user->fio,
                    'image' => $user->img ? '/admin/avatars/'.$user->img : '',
                    'link' => Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $user->id]),
                    'category' => 'Пользователи',
                ];
            }
        }
        if($packages = Package::find()->where(['like', 'name', $this->request])->orWhere(['like', 'size', $this->request])->all()) {
            foreach($packages as $package) {
                $result[] = [
                    'name' => $package->name,
                    'image' => $package->img ? Yii::getAlias('@package_view').'/'.$package->img : '',
                    'link' => Yii::$app->urlManager->createUrl(['admin/package/view', 'id' => $package->id]),
                    'category' => 'Тара/упаковка',
                ];
            }
        }

        return $result;
    }
}