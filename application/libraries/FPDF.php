<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/fpdf185/fpdf.php';
class FPDF extends \fpdf185\FPDF
{
    public function __construct() {
        parent::__construct();
    }
}