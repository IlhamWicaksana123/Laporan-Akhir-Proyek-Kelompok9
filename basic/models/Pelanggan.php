<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $id_pelanggan
 * @property string $nama_pelanggan
 * @property string|null $telepon
 * @property int $id_penjual
 *
 * @property Penjual $penjual
 * @property Transaksi[] $transaksis
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelanggan', 'nama_pelanggan', 'id_penjual'], 'required'],
            [['id_pelanggan', 'id_penjual'], 'integer'],
            [['nama_pelanggan'], 'string', 'max' => 45],
            [['telepon'], 'string', 'max' => 50],
            [['id_pelanggan'], 'unique'],
            [['id_penjual'], 'exist', 'skipOnError' => true, 'targetClass' => Penjual::class, 'targetAttribute' => ['id_penjual' => 'id_penjual']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelanggan' => 'Id Pelanggan',
            'nama_pelanggan' => 'Nama Pelanggan',
            'telepon' => 'Telepon',
            'id_penjual' => 'Id Penjual',
        ];
    }

    /**
     * Gets query for [[Penjual]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjual()
    {
        return $this->hasOne(Penjual::class, ['id_penjual' => 'id_penjual']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_pelanggan' => 'id_pelanggan']);
    }
}
