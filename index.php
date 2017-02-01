<?php

require 'DvdQuery.php';

use Database\Query\DvdQuery;

// Query 1 (with orderByTitle)
$dvdQuery = new DvdQuery();
$dvdQuery->titleContains('Die');
$dvdQuery->orderByTitle();
$dvds = $dvdQuery->find();
// var_dump($dvds);

// Query 2 (without orderByTitle)
$dvdQuery = new DvdQuery();
$dvdQuery->titleContains('Die');
// orderByTitle is not called here
$dvds2 = $dvdQuery->find();
//changed dvds to dvds2 for making second table. Hope thats ok!!
?>


<br>
<table style= "width:40%" id="table1">
  <tr>
    <th>Title </th>
    <th> ID </th>
    <th> Rating </th>
  </tr>

  <?php foreach ($dvds as $dvd) : ?>
    <tr>
      <td> <?= $dvd->title ?> </td>
      <td>  <?= $dvd->id ?> </td>
      <td>  <?= $dvd->rating_name ?> </td>
    </tr>
  <?php endforeach; ?>

<br>

<table style= "width:40%" id="table2">
  <tr>
    <th>Title </th>
    <th> ID </th>
    <th> Rating </th>
  </tr>

  <?php foreach ($dvds2 as $dvd) : ?>
    <tr>
      <td> <?= $dvd->title ?> </td>
      <td>  <?= $dvd->id ?> </td>
      <td>  <?= $dvd->rating_name ?> </td>
    </tr>
  <?php endforeach; ?>

<style>
  #table1{
    float: left;
    margin-right: 60px;
  }
</style>
