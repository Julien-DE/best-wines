<?php

namespace App\Controllers;

use Core\Controller;

use App\Models\Region;
use App\Models\Product;
use App\Models\Cepage;
use App\Models\Taste;
use App\Models\Association;
use App\Models\TypeProduct;

class StockController extends Controller
{
    public function showAll()
    {

        $product = new Product();

        $products = $product->findAll();
        $this->renderView('employe/stock/index', compact('products'));
    }


    /**
     * Insérer un nouveau produit
     *
     * @return void
     */

    public function insert()
    {
        $region = new Region();
        $regions = $region->findAll();

        $cepage = new Cepage();
        $cepages = $cepage->findAll();

        $taste = new Taste();
        $tastes = $taste->findAll();

        $association = new Association();
        $associations = $association->findAll();

        $type_product = new TypeProduct();
        $type_products = $type_product->findAll();

        $this->renderView('employe/stock/insert', compact('regions', 'cepages', 'tastes', 'associations', 'type_products'));


        if (isset($_POST['submit'])) {

            $product = new Product();

            $product->setName(htmlentities($_POST['name']));
            $product->setDescription(htmlentities($_POST['description']));
            $product->setStock(htmlentities($_POST['stock']));
            $product->setAlcohol_percentage(htmlentities($_POST['alcohol_percentage']));
            $product->setId_region($_POST['id_region']);
            $product->setId_cepage($_POST['id_cepage']);
            $product->setId_taste($_POST['id_taste']);
            $product->setId_association($_POST['id_association']);
            $product->setId_type($_POST['id_type']);
            $product->setPrice($_POST['price']);
            // $product->setPhoto($_POST['photo']);

            $result = $product->insert();

            if ($result) {
                $message =  "insertion bien effectuée";
            } else {
                $message =  "échec de l'insertion";
            }
            $this->renderView('employe/stock/insert', [
                'message' => $message
            ]);
        }
        $this->renderView('employe/stock/insert');
    }

    public function edit()
    {
        $id = $_GET['id'];

        $to_edit = new Product;
        $to_edit->findOneBy(['id' => $id]);
        $edit_temp = $to_edit->findOneBy(['id' => $id]);

        $region = new Region();
        $regions = $region->findAll();

        $cepage = new Cepage();
        $cepages = $cepage->findAll();

        $taste = new Taste();
        $tastes = $taste->findAll();

        $association = new Association();
        $associations = $association->findAll();

        $type_product = new TypeProduct();
        $type_products = $type_product->findAll();



        if (isset($_POST['submit'])) {
            $to_edit->edit($id);
            $result = $to_edit->edit($id);
            if ($result) {
                $message =  "edit bien effectuée";
            } else {
                $message =  "échec de l'édit";
            };
            $to_edit->findOneBy(['id' => $id]);
            $edit_temp = $to_edit->findOneBy(['id' => $id]);
            $this->renderView(
                'employe/stock/edit',
                compact('message', 'id', 'edit_temp', 'regions', 'cepages', 'tastes', 'associations', 'type_products')
            );
        }
        $this->renderView('employe/stock/edit', compact('id', 'edit_temp', 'regions', 'cepages', 'tastes', 'associations', 'type_products'));
    }


    public function delete()
    {
        $id = $_GET['id'];
        $to_delete = new Product;
        $to_delete->delete($id);
        header('Location: /best-wines/employe/stock');
    }

    public function showAllRegion()
    {

        $region = new Region();
        $regions = $region->findAll();
        $this->renderView('employe/stock/insert', compact('regions'));
    }
}
