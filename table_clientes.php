
<?php

require("config/config.php");

   if (isset($_GET['dell'])) {
           $id = $_GET['dell'];

           $sql = "DELETE FROM clientes WHERE id = '".$id."'";

       $query = mysqli_query($con, $sql);

       if($query){
           echo "<script> alert('ID: ".$id." apagado');
                   location.href = 'table_clientes.php';
           </script>";
       }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Clientes</title>
   <style>
       body {
 font: 75%/1.6 "Myriad Pro", Frutiger, "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", Verdana, sans-serif;
}
table {
 border-collapse: collapse;
 width: 50em;
 border: 1px solid #666;
}
thead {
 background: #ccc url(https://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;
 border-top: 1px solid #a5a5a5;
 border-bottom: 1px solid #a5a5a5;
}
tr:hover {
 background-color:#3d80df;
 color: #fff;
}
thead tr:hover {
 background-color: transparent;
 color: inherit;
}
tr:nth-child(even) {
   background-color: #edf5ff;
}
th {
 font-weight: normal;
 text-align: left;
}
th, td {
 padding: 0.1em 1em;
}
   </style>
</head>
<body>
<table id="playlistTable">
 <caption>Clientes</caption>
 <thead>
   <tr>
     <th>Id</th>
     <th>Nome</th>
     <th>Email</th>
     <th>Senha</th>
     <th>Ações</th>
   </tr>
 </thead>

 <tbody>
 <?php
                   $sql = "SELECT * FROM clientes";

                   $query = mysqli_query($con, $sql);

                   if(mysqli_num_rows($query) < 1){
                       echo "<tr>
                           <td colspan='2'>Não possui usuários cadastrados!</td>
                       <tr>";
                   }else{
                       while ($dados = mysqli_fetch_array($query)) {
                       echo "<tr>
                             <td>".$dados['id']."</td>
                             <td style='width:200px'>".$dados['nome']."</td>
                             <td style='width:200px'>".$dados['email']."</td>
                             <td style='width:200px'>".$dados['senha']."</td>
                             <td><a href=?dell=".$dados['id'].">Apagar</a></td>
                         </tr>";
                       }
                   }
               ?>
 </tbody>
</table>
</body>
</html>