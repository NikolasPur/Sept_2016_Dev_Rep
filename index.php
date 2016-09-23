<!DOCTYPE html>
<html>
<!-- MAKES TO DO FORM Copyright 2016 The NBG Authors. All rights reserved.
     Use of this source code is governed by a BSD-style license that can be
     found in the LICENSE file.
-->
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>

<body>
 <?php include_once 'post_req_handler.php';?>
 <?php include_once 'get_req_handler.php';?>

  
  <div id="container">
    <h1>Welcome: Insert Task here </h1>
    <div id="app">
      <form id='add-form'>
	   <!-- <form id='add-form'action="html_req_handler.php" method = "get"> -->
        <input id="create" name="itemDescription" type="text" placeholder=" Add new task here!">
      </form>
      <ul id='list'>
      </ul>
    </div>
  </div>
  <ul id='templates'>
    <li class='item' data-id="some id">
      <span class='complete-button'>&#10004;</span>
      <div class="description">New Reminder</div>
      <span class="delete-button">&#10008;</span>
    </li>
  </ul>

  <script src="to_do_list.js"></script>
</body>
</html>
