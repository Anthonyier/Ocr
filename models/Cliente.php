<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $ci
 * @property string $nombre
 * @property integer $telefono
 * @property string $sexo
 * @property string $dir
 * @property integer $edad
 *
 * @property Historialclinico[] $historialclinicos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci', 'nombre', 'telefono', 'sexo', 'dir', 'edad'], 'required'],
            [['ci', 'telefono', 'edad'], 'integer'],
            [['nombre', 'dir'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ci' => 'Ci',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'sexo' => 'Sexo',
            'dir' => 'Dir',
            'edad' => 'Edad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialclinicos()
    {
        return $this->hasMany(Historialclinico::className(), ['idcliente' => 'ci']);
    }
}
