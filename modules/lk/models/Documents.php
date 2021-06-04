<?php

namespace app\modules\lk\models;

use app\models\StorageItems;
use Yii;
use kartik\mpdf\Pdf;
use app\models\User;

class Documents extends \yii\base\Model
{
    const TEMPLATE_AGREEMENT_STORAGE = 1;


    public $user;
    public $settings;
    public $thing;
    public $template;

    public function getTemplateValue()
    {
        return [
            self::TEMPLATE_AGREEMENT_STORAGE => 'Договор ответственного хранения',
        ];
    }
    public function generatePDF() {
        $file_path = '/files/agreement-storage.pdf';
        $content = Yii::$app->controller->renderPartial('/documents/pdf', [
            'user' => $this->user,
            'settings' => $this->settings,
            'thing' => $this->thing,
            'model' => $this,
        ]);
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
        return $this->template.'-'.$user->id.'-'.$this->thing->id;
    }

}