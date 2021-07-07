<?php

namespace app\modules\lk\models;

use app\models\Rent;
use app\models\StorageItems;
use Yii;
use kartik\mpdf\Pdf;
use app\models\User;

class Documents extends \yii\base\Model
{
    const TEMPLATE_AGREEMENT_STORAGE = 1;
    const TEMPLATE_AGREEMENT_RETURN = 2;


    public $user;
    public $settings;
    public $things;
    public $template;
    public $storage;
    public $type;
    public $model = false;

    public function getTemplateValue()
    {
        return [
            self::TEMPLATE_AGREEMENT_STORAGE => 'Договор ответственного хранения',
        ];
    }
    public function generatePDF() {
        if($this->template == self::TEMPLATE_AGREEMENT_STORAGE) {
            $file_path = '/files/agreement-storage.pdf';
            $content = Yii::$app->controller->renderPartial('/documents/pdf', [
                'user' => $this->user,
                'settings' => $this->settings,
                'things' => $this->things,
                'document' => $this,
                'model' => $this->model,
            ]);
        }
        elseif($this->template == self::TEMPLATE_AGREEMENT_RETURN) {
            $file_path = '/files/return-pdf.pdf';
            $content = Yii::$app->controller->renderPartial('/documents/return-pdf', [
                'user' => $this->user,
                'settings' => $this->settings,
                'things' => $this->things,
                'document' => $this,
                'model' => $this->model,
            ]);
        }


        $pdf = new Pdf([
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'filename' => Yii::getAlias('@webroot').$file_path,
            'destination' => Pdf::DEST_FILE,
            'content' => $content,
            'marginTop' => 15,
            'marginHeader' => 25,
            'cssInline' => '
                @page {header: html_myHeader;}
                body {font-family: Georgia, sans-serif;}
            ',
        ]);
        $pdf->render();
        return Yii::getAlias('@webroot').$file_path;
    }
    public function getAgreementNumber()
    {
        $user_id = Yii::$app->user->id;
        $user = User::findOne($user_id);
        return $this->template.'-'.$user->id.'-'.$this->storage->id;
    }
    public function getThingRent()
    {
        if($this->things) {
            if($rents = Rent::find()->all()) {
                foreach($rents as $rent) {
                    return $rent;
                    foreach ($this->things as $thing) {
                        if(in_array($thing->id, explode(',', $rent->thing_ids))) return $rent;
                    }
                }
            }
        }
        return false;
    }
    public static function number2string($number) {

        // обозначаем словарь в виде статической переменной функции, чтобы
        // при повторном использовании функции его не определять заново
        static $dic = array(

            // словарь необходимых чисел
            array(
                -2	=> 'две',
                -1	=> 'одна',
                1	=> 'один',
                2	=> 'два',
                3	=> 'три',
                4	=> 'четыре',
                5	=> 'пять',
                6	=> 'шесть',
                7	=> 'семь',
                8	=> 'восемь',
                9	=> 'девять',
                10	=> 'десять',
                11	=> 'одиннадцать',
                12	=> 'двенадцать',
                13	=> 'тринадцать',
                14	=> 'четырнадцать' ,
                15	=> 'пятнадцать',
                16	=> 'шестнадцать',
                17	=> 'семнадцать',
                18	=> 'восемнадцать',
                19	=> 'девятнадцать',
                20	=> 'двадцать',
                30	=> 'тридцать',
                40	=> 'сорок',
                50	=> 'пятьдесят',
                60	=> 'шестьдесят',
                70	=> 'семьдесят',
                80	=> 'восемьдесят',
                90	=> 'девяносто',
                100	=> 'сто',
                200	=> 'двести',
                300	=> 'триста',
                400	=> 'четыреста',
                500	=> 'пятьсот',
                600	=> 'шестьсот',
                700	=> 'семьсот',
                800	=> 'восемьсот',
                900	=> 'девятьсот'
            ),

            // словарь порядков со склонениями для плюрализации
            array(
                array('рубль', 'рубля', 'рублей'),
                array('тысяча', 'тысячи', 'тысяч'),
                array('миллион', 'миллиона', 'миллионов'),
                array('миллиард', 'миллиарда', 'миллиардов'),
                array('триллион', 'триллиона', 'триллионов'),
                array('квадриллион', 'квадриллиона', 'квадриллионов'),
                // квинтиллион, секстиллион и т.д.
            ),

            // карта плюрализации
            array(
                2, 0, 1, 1, 1, 2
            )
        );

        // обозначаем переменную в которую будем писать сгенерированный текст
        $string = array();

        // дополняем число нулями слева до количества цифр кратного трем,
        // например 1234, преобразуется в 001234
        $number = str_pad($number, ceil(strlen($number)/3)*3, 0, STR_PAD_LEFT);

        // разбиваем число на части из 3 цифр (порядки) и инвертируем порядок частей,
        // т.к. мы не знаем максимальный порядок числа и будем бежать снизу
        // единицы, тысячи, миллионы и т.д.
        $parts = array_reverse(str_split($number,3));

        // бежим по каждой части
        foreach($parts as $i=>$part) {

            // если часть не равна нулю, нам надо преобразовать ее в текст
            if($part>0) {

                // обозначаем переменную в которую будем писать составные числа для текущей части
                $digits = array();

                // если число треххзначное, запоминаем количество сотен
                if($part>99) {
                    $digits[] = floor($part/100)*100;
                }

                // если последние 2 цифры не равны нулю, продолжаем искать составные числа
                // (данный блок прокомментирую при необходимости)
                if($mod1=$part%100) {
                    $mod2 = $part%10;
                    $flag = $i==1 && $mod1!=11 && $mod1!=12 && $mod2<3 ? -1 : 1;
                    if($mod1<20 || !$mod2) {
                        $digits[] = $flag*$mod1;
                    } else {
                        $digits[] = floor($mod1/10)*10;
                        $digits[] = $flag*$mod2;
                    }
                }

                // берем последнее составное число, для плюрализации
                $last = abs(end($digits));

                // преобразуем все составные числа в слова
                foreach($digits as $j=>$digit) {
                    $digits[$j] = $dic[0][$digit];
                }

                // добавляем обозначение порядка или валюту
                $digits[] = $dic[1][$i][(($last%=100)>4 && $last<20) ? 2 : $dic[2][min($last%10,5)]];

                // объединяем составные числа в единый текст и добавляем в переменную, которую вернет функция
                array_unshift($string, join(' ', $digits));
            }
        }

        // преобразуем переменную в текст и возвращаем из функции, ура!
        return join(' ', $string);
    }

}