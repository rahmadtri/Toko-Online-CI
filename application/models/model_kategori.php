<?php
class Model_kategori extends CI_Model
{
    public function data_elektronik()
    {
        return $this->db->get_where('tb_barang', [
            'kategori' => 'elektronik'
        ]);
    }
    public function data_pakaian_pria()
    {
        return $this->db->get_where('tb_barang', [
            'kategori' => 'pakaian pria'
        ]);
    }
    public function data_kecantikan()
    {
        return $this->db->get_where('tb_barang', [
            'kategori' => 'kecantikan'
        ]);
    }
}
