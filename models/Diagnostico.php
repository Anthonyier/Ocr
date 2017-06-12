<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnostico".
 *
 * @property integer $iddiag
 * @property string $imagen
 * @property integer $idhist
 * @property string $nombre
 *
 * @property Historialclinico $idhist0
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'diagnostico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddiag', 'imagen', 'idhist'], 'required'],
            [['iddiag', 'idhist'], 'integer'],
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
            'iddiag' => 'Iddiag',
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
