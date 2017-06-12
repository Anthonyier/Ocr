<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receta".
 *
 * @property integer $idrec
 * @property string $imagen
 * @property integer $idhist
 * @property string $nombre
 *
 * @property Historialclinico $idhist0
 */
class Receta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'receta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrec', 'imagen', 'idhist'], 'required'],
            [['idrec', 'idhist'], 'integer'],
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
            'idrec' => 'Idrec',
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
