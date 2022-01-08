<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About'
        ];

        $this->view('about', $data);
    }

    public function products() {
        $data = [
            'title' => 'Products'
        ];

        $this->view('products', $data);
    }

    public function contact() {
        $data = [
            'title' => 'Contact'
        ];

        $this->view('contact', $data);
    }

    public function registerContact() {  
        // variables
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $msg = $_POST["message"];
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        $string_exp = "/^[A-Za-z .'-]+$/";

        // error handlers
        if(empty($fname) || empty($email)) {
            header("Location: contact?error=emptyfnameemptyemail");
            exit();
        }  else if (!preg_match($email_exp, $email) && !preg_match($string_exp, $fname) && !preg_match($string_exp, $msg)) {
            header("Location: contact?error=invalidform");
            exit(); 
        } else if (!preg_match($email_exp, $email)) {
            header("Location: contact?error=invalidemail");
            exit();
        } else if (!preg_match($string_exp, $fname)) {
            header("Location: contact?error=invalidname");
            exit();
        } else if (!preg_match($string_exp, $msg)) {
            header("Location: contact?error=invalidmessage");
            exit();
         } else {
            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);
            // headers
            $headers = 'Email from: ' . $_POST["email"];
            // send email
            mail("wesleyhogeveen166@hotmail.com","Digital Solutions contact form",$msg, $headers);

            $contactModel = $this->model('Contact');
            $contactModel->submit();
            header("Location: contact?error=noerror");
            exit();
        }
    }

    public function news() {
        $data = [
            'title' => 'News'
        ];

        $this->view('news', $data);
    }
}
