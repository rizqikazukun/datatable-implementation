<?php

namespace App\Controller;

class CrudApiController {

    public static function SelectAll($app, $requestuest, $response, $args){
        $response = $app->db->select("produk", "*");
        return $response;
    }

    public static function DeleteProduk($app, $request, $response, $args){

        $idProduct = $request->getParam('idProduct');

        $delete = $app->db->delete("produk", [ "id" => $idProduct ])->rowCount();

        $response = [
            "success" => true,
            "message" =>  "Produk Terhapus",
            "data" => [
                "Jumlah yang terupdate" => $delete,
            ],
        ];

        return $response;

    }

    public static function UpdateProduk($app, $request, $response, $args){

        $idProduct = $request->getParam('idProduct');
        $namaProduk = $request->getParam('namaProduk');
        $keterangan = $request->getParam('keterangan');
        $harga = $request->getParam('harga');
        $jumlah = $request->getParam('jumlah');

        $update = $app->db->update("produk", [
            "nama_produk" => $namaProduk,
            "keterangan" => $keterangan,
            "harga" => $harga,
            "jumlah" => $jumlah
        ], [
            "id" => $idProduct
        ])->rowCount();
        
        $response = [
            "success" => true,
            "message" =>  "Produk Diupdate",
            "data" => [
                "Jumlah yang terupdate" => $update,
            ],
        ];
        return $response;

    }
    
    public static function InsertProduk($app, $request, $response, $args){

        $namaProduk = $request->getParam('namaProduk');
        $keterangan = $request->getParam('keterangan');
        $harga = $request->getParam('harga');
        $jumlah = $request->getParam('jumlah');
        
        $app->db->insert("produk", [
            "nama_produk" => $namaProduk,
            "keterangan" => $keterangan,
            "harga" => $harga,
            "jumlah" => $jumlah
        ]);

        $lastAdded = $app->db->id();
        $response = [
            "success" => true,
            "message" =>  "Produk Ditambah",
            "data" => [
                "produk" => $lastAdded,
            ],
        ];
        return $response;
    }



}