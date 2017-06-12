<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historialclinico".
 *
 * @property integer $id
 * @property string $imagen
 * @property integer $idcliente
 * @property integer $iddoctor
 * @property string $nombre
 *
 * @property Diagnostico[] $diagnosticos
 * @property Cliente $idcliente0
 * @property Doctor $iddoctor0
 * @property Informe[] $informes
 * @property Ordenesdeanalisis[] $ordenesdeanalises
 * @property Receta[] $recetas
 */
class Historialclinico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'historialclinico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'imagen', 'idcliente', 'iddoctor'], 'required'],
            [['id', 'idcliente', 'iddoctor'], 'integer'],
            [['file'],'file'],
            [['imagen'], 'string', 'max' => 250],
            [['nombre'], 'string', 'max' => 50],
            [['idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idcliente' => 'ci']],
            [['iddoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['iddoctor' => 'ci']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'Imagen',
            'idcliente' => 'Idcliente',
            'iddoctor' => 'Iddoctor',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos()
    {
        return $this->hasMany(Diagnostico::className(), ['idhist' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcliente0()
    {
        return $this->hasOne(Cliente::className(), ['ci' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddoctor0()
    {
        return $this->hasOne(Doctor::className(), ['ci' => 'iddoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformes()
    {
        return $this->hasMany(Informe::className(), ['idhist' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenesdeanalises()
    {
        return $this->hasMany(Ordenesdeanalisis::className(), ['idhist' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['idhist' => 'id']);
    }
}
