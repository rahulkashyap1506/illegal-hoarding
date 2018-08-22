<?php
$this->load->view('includes/header'); //loades the header

$this->load->view('includes/side_bar'); //loades the sidebar menu

$this->load->view($page_to_load);

$this->load->view('includes/footer'); //loades the footer
?>