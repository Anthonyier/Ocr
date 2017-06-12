<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informe".
 *
 * @property integer $idinf
 * @property string $imagen
 * @property integer $idhist
 * @property string $nombre
 *
 * @property Historialclinico $idhist0
 */
class Informe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informe';
    }

    /**
     * @inheritdoc
     */
    public $file;
    public function rules()
    {
        return [
            [['idinf', 'imagen', 'idhist'], 'required'],
            [['idinf', 'idhist'], 'integer'],
            [['file'],'file'],
            [['imagen'], 'string', 'max' => 250],
            [['nombre'], 'string', 'max' => 50],
            [['idhist'], 'exist', 'skipOnError' => true, 'targetClass' => Historialclinico::className(), 'targetAttribute' => ['idhist' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinf' => 'Idinf',
            'file' => 'Imagen',
            'idhist' => 'Idhist',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdhist0()
    {
        return $this->hasOne(Historialclinico::className(), ['id' => 'idhist']);
    }
}
