<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string $nama_barang
 * @property int|null $harga_satuan
 * @property int $id_kategori
 * @property string|null $gambar
 *
 * @property Kategori $kategori
 * @property Transaksi[] $transaksis
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'nama_barang', 'id_kategori'], 'required'],
            [['id_barang', 'harga_satuan', 'id_kategori'], 'integer'],
            [['gambar'], 'string'],
            [['nama_barang'], 'string', 'max' => 45],
            [['id_barang'], 'unique'],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::class, 'targetAttribute' => ['id_kategori' => 'id_kategori']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
            'harga_satuan' => 'Harga Satuan',
            'id_kategori' => 'Id Kategori',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::class, ['id_kategori' => 'id_kategori']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_barang' => 'id_barang']);
    }
}
