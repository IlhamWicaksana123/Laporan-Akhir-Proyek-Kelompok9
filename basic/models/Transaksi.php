<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_transaksi
 * @property string|null $tgl_transaksi
 * @property int|null $total
 * @property int $id_barang
 * @property int $id_penjual
 * @property int $id_pelanggan
 *
 * @property Barang $barang
 * @property Pelanggan $pelanggan
 * @property Penjual $penjual
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_transaksi'], 'safe'],
            [['total', 'id_barang', 'id_penjual', 'id_pelanggan'], 'integer'],
            [['id_barang', 'id_penjual', 'id_pelanggan'], 'required'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::class, 'targetAttribute' => ['id_barang' => 'id_barang']],
            [['id_pelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::class, 'targetAttribute' => ['id_pelanggan' => 'id_pelanggan']],
            [['id_penjual'], 'exist', 'skipOnError' => true, 'targetClass' => Penjual::class, 'targetAttribute' => ['id_penjual' => 'id_penjual']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'tgl_transaksi' => 'Tgl Transaksi',
            'total' => 'Total',
            'id_barang' => 'Id Barang',
            'id_penjual' => 'Id Penjual',
            'id_pelanggan' => 'Id Pelanggan',
        ];
    }

    /**
     * Gets query for [[Barang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::class, ['id_barang' => 'id_barang']);
    }

    /**
     * Gets query for [[Pelanggan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::class, ['id_pelanggan' => 'id_pelanggan']);
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
}
