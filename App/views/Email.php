<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php //print_r($view[0]); die();?>

<h2>The following Items currently unavailable</h2>

<table>
  <tr>
    <th>Barcode</th>
    <th>ItemCode</th>
    <th>ItemDescription</th>
  </tr>
  
  <?php foreach ($view as $row) : ?>
  
  <tr>
    <td><?php echo $row['Barcode'];?></td>
    <td><?php echo $row['ItemCode'];?></td>
    <td><?php echo $row['ItemDescription'];?></td>
  </tr>
  
  <?php endforeach;?>
  
</table>

</body>
</html>
