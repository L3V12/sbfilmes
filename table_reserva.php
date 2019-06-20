
<?php

require("config/config.php");

   if (isset($_GET['dell'])) {
           $id = $_GET['dell'];

           $sql = "DELETE FROM filmes WHERE id = '".$id."'";

       $query = mysqli_query($con, $sql);

       if($query){
           echo "<script> alert('ID: ".$id." apagado');
                   location.href = 'table_reserva.php';
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
   <title>Filmes</title>
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
 <caption>Filmes</caption>
 <thead>
   <tr>
     <th>Id</th>
     <th>id_categoria</th>
     <th>nome</th>
     <th>descricão</th>
     <th>preço</th>
     <th>disponibilidade</th>
     <th>fabricante</th>
     <th>imagens</th>
     <th>Ações</th>
   </tr>
 </thead>

 <tbody>
 <?php
                   $sql = "SELECT * FROM filmes";

                   $query = mysqli_query($con, $sql);

                   if(mysqli_num_rows($query) < 1){
                       echo "<tr>
                           <td colspan='2'>Não possui usuários cadastrados!</td>
                       <tr>";
                   }else{
                       while ($dados = mysqli_fetch_array($query)) {
                       echo "<tr>
                             <td>".$dados['id']."</td>
                             <td style='width:200px'>".$dados['id_categoria']."</td>
                             <td style='width:200px'>".$dados['nome']."</td>
                             <td style='width:200px'>".$dados['descricao']."</td>
                             <td style='width:200px'>".$dados['preco']."</td>
                             <td style='width:200px'>".$dados['disponibilidade']."</td>
                             <td style='width:200px'>".$dados['fabricante']."</td>
                             <td style='width:200px'>".$dados['img']."</td>
                             <td><a href=?dell=".$dados['id'].">Apagar</a></td>
                         </tr>";
                       }
                   }
               ?>
 </tbody>
</table>
</body>
</html>