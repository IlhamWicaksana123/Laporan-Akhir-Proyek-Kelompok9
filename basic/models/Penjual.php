<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjual".
 *
 * @property string|null $nama_penjual
 * @property int $id_penjual
 * @property string $alamat
 * @property string|null $telepon
 *
 * @property Pelanggan[] $pelanggans
 * @property Transaksi[] $transaksis
 */
class Penjual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjual', 'alamat'], 'required'],
            [['id_penjual'], 'integer'],
            [['alamat'], 'string'],
            [['nama_penjual'], 'string', 'max' => 100],
            [['telepon'], 'string', 'max' => 50],
            [['id_penjual'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama_penjual' => 'Nama Penjual',
            'id_penjual' => 'Id Penjual',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
        ];
    }

    /**
     * Gets query for [[Pelanggans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggans()
    {
        return $this->hasMany(Pelanggan::class, ['id_penjual' => 'id_penjual']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_penjual' => 'id_penjual']);
    }
}
