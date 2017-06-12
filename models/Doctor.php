<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $ci
 * @property string $nombre
 * @property integer $telefono
 * @property string $cargo
 * @property string $dir
 *
 * @property Historialclinico[] $historialclinicos
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci', 'nombre', 'telefono', 'cargo', 'dir'], 'required'],
            [['ci', 'telefono'], 'integer'],
            [['nombre', 'cargo', 'dir'], 'string', 'max' => 50],
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
            'cargo' => 'Cargo',
            'dir' => 'Dir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialclinicos()
    {
        return $this->hasMany(Historialclinico::className(), ['iddoctor' => 'ci']);
    }
}
