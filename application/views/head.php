<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$title?> - Student Records</title>
  <style type="text/css">
    body {
      font-family: Ubuntu,sans-serif;
      color: black;
      background: white;
    }
    table {
      border: solid black 2px;
    }
    tr.even {
      background: #ddd;
    }
    th, td {
      border: solid 1px black;
      text-align: left;
      padding: 0.1em 0.5em;
    }
    th {
      background: black;
      color: white;
      border-color: white;
    }
  </style>
</head>
<body>
<h1><?=anchor('', 'Student Records', array('title'=>'Go to the home page...'))?></h1>
<h1><?=$title?></h1>
