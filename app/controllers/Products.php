<?php
class Products extends Controller {
    public function __construct() {
        $this->productModel = $this->model('Product');
    }

    public function index() {
        $products = $this->productModel->findAllProducts();

        $data = [
            'products' => $products
        ];

        $this->view('products/index', $data);
    }

    public function create() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/products");
        }

        $data = [
            'title' => '',
            'descr' => '',
            'itemlink' => '',
            'titleError' => '',
            'descrError' => '',
            'itemError' => ''
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'descr' => trim($_POST['descr']),
                'itemlink' => trim($_POST['itemlink']),
                'titleError' => '',
                'descrError' => '',
                'itemError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a product cannot be empty';
            }

            if(empty($data['descr'])) {
                $data['descrError'] = 'The description of a product cannot be empty';
            }

            if(empty($data['itemlink'])) {
              $data['itemError'] = 'The link of a product cannot be empty';
            }

            if (empty($data['titleError']) && empty($data['descrError']) && empty($data['itemError'])) {
                if ($this->productModel->addProduct($data)) {
                    header("Location: " . URLROOT . "/products");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('products/create', $data);
            }
        }

        $this->view('products/create', $data);
    }

    public function update($id) {

        $product = $this->productModel->findProductById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/products");
        } elseif($product->user_id != $_SESSION['user_id']){
            header("Location: " . URLROOT . "/products");
        }
        
        $data = [
            'product' => $product,
            'title' => '',
            'descr' => '',
            'itemlink' => '',
            'titleError' => '',
            'descrError' => '',
            'itemError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'product' => $product,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'descr' => trim($_POST['descr']),
                'itemlink' => trim($_POST['itemlink']),
                'titleError' => '',
                'descrError' => '',
                'itemError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a product cannot be empty';
            }

            if(empty($data['descr'])) {
                $data['descrError'] = 'The description of a product cannot be empty';
            }

            if(empty($data['itemlink'])) {
                $data['itemError'] = 'The link of a product cannot be empty';
              }

            if($data['title'] == $this->productModel->findProductById($id)->title) {
                $data['titleError'] == 'At least change the title!';
            }

            if($data['descr'] == $this->productModel->findProductById($id)->descr) {
                $data['descrError'] == 'At least change the description!';
            }

            if($data['itemlink'] == $this->productModel->findProductById($id)->itemlink) {
                $data['itemError'] == 'At least change the link url!';
            }

            if (empty($data['titleError']) && empty($data['descrError']) && empty($data['itemError'])) {
                if ($this->productModel->updateProduct($data)) {
                    header("Location: " . URLROOT . "/products");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('products/update', $data);
            }
        }

        $this->view('products/update', $data);
    }

    public function delete($id) {

        $product = $this->productModel->findProductById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } elseif($product->user_id != $_SESSION['user_id']){
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'product' => $product,
            'title' => '',
            'descr' => '',
            'itemlink' => '',
            'titleError' => '',
            'descrError' => '',
            'itemError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->productModel->deleteProduct($id)) {
                    header("Location: " . URLROOT . "/products");
            } else {
               die('Something went wrong!');
            }
        }
    }
}


