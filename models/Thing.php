<?php

namespace app\models;
use app\components\Functions;
use app\models\CatsThing;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Thing extends ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [['name', 'cat', 'parent_cat'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['barcode', 'cat', 'parent_cat', 'user', 'is_rent', 'storage_items_id', 'deposit', 'created_at'], 'integer'],
            [['name', 'description', 'img', 'qr_code'], 'string'],
            [['file'], 'file'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'barcode',
            'name',
            'description',
            'img',
            'cat',
            'parent_cat',
            'user',
            'file',
            'qr_code',
            'is_rent',
            'storage_items_id',
            'created_at',
            'deposit',
        ];
    }
    public function attributeLabels()
    {
        return [
            'barcode' => 'Штрих-код',
            'name' => 'Название',
            'description' => 'Описание',
            'img' => 'Изображение',
            'cat' => 'Категория',
            'parent_cat' => 'Подкатегория',
            'user' => 'Вещь пользователя',
            'qr_code' => 'QR код',
            'is_rent' => 'Возможность сдать в аренду',
            'created_at' => 'Дата создания',
            'deposit' => 'Депозит',
        ];
    }
    public function getCategory(){
        return $this->hasOne(CatsThing::className(), ['id' => 'cat']);
    }
    public function getCategoryParent(){
        return $this->hasOne(CatsThing::className(), ['id' => 'parent_cat']);
    }
    public function getUsers(){
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
    public function getRent()
    {
        if($rents = Rent::findAll(['user_id' => $this->user])) {
            foreach($rents as $rent) {
                $things = explode(',', $rent->thing_ids);
                if(in_array($this->id, $things)) return $rent;
            }
        }
        return false;
    }
    public function getQrCode($img = false)
    {
        $functions = new Functions();
        if($img) {
            return $functions->qrCodeImg($this->qr_code);
        }
        $this->qr_code = $functions->qrCode($this->name, $this->user);
    }
    public function getParentCalList()
    {
        if($this->parent_cat) {
            return CatsThing::findAll(['parent_id' => $this->parent_cat]);
            /*
            if($model = CatsThing::findAll(['parent_id' => $this->parent_cat])) {
                $str = '<option value="">--Выбрать--</option>';
                foreach($model as $value) {
                    $str .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
                return $str;
            }
            */
        }
        return [];
    }
    public function getUploadFile()
    {
        if($this->file = UploadedFile::getInstance($this, 'img')) {
            if(!$this->user) $this->user = 0;
            $this->file->saveAs('admin/things/img-user-'.$this->user.'-thing-'.$this->id.'.'. $this->file->extension);
            $this->img = 'img-user-'.$this->user.'-thing-'.$this->id.'.'. $this->file->extension;
            if($this->save()) {
                Yii::$app->session->setFlash('success', "Вещь успешно сохранена, файл успешно загружен!");
                return true;
                //return $this->redirect('view?id='.$model->id);
            }
        }
        return false;
    }
    public function getStoragePrice()
    {
        if($storage_items = StorageItems::findOne(['thing_id' => $this->id])) {
            return $storage_items->storage ? $storage_items->storage->price_total : 0;
        }
        return 0;
    }
    public function getTerm()
    {
        if($storage_items = StorageItems::findOne(['thing_id' => $this->id])) {
            return $storage_items->storage ? $storage_items->storage->term : 0;
        }
        return 0;
    }
    public function getFindRent()
    {
        if($rents = Rent::find()->all()) {
            foreach ($rents as $rent) {
                $thing_ids = explode(',', $rent->thing_ids);
                if(in_array($this->id, $thing_ids)) return $rent;
            }
        }
        return false;
    }
    public function getStorageId()
    {
        if($storageItem = StorageItems::findOne(['thing_id' => $this->id])) {
            return $storageItem->storage_id;
        }
        return false;
    }
    public function getUnsetRent()
    {
        $this->is_rent = 0;
        $this->save();
        if($rents = Rent::findAll(['user_id' => $this->user])) {
            foreach($rents as $rent) {
                $things = explode(',', $rent->thing_ids);
                if(in_array($this->id, $things)) {
                    if(count($things) == 1) {
                        if($rent->delete() /*&& $this->deleteStorageItems && $this->delete()*/) return true;
                    } else {
                        $new_things = [];
                        foreach($things as $thing) {
                            if($thing != $this->id) $new_things[] = $thing;
                        }
                        $rent->thing_ids = implode(',', $new_things);
                        if($rent->save() /*&& $this->deleteStorageItems && $this->delete()*/) return true;
                    }
                }
            }
        }
    }
    public function getDeleteStorageItems()
    {
        $success = false;
        if($storageItem = StorageItems::findOne(['thing_id' => $this->id])) {
            $storageId = $storageItem->storage_id;
            if($success = $storageItem->delete()) {
                if($storage = Storage::findOne($storageId)) {
                    if(count($storage) == 1) $success = $storage->delete();
                }
            }
        }
        return $success;
    }

}



