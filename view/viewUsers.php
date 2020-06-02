<?php

// Switch entre edit / list d'avant MVC

// $action = "userpanel.php";
// $editing = false;

// if(isset($_GET["edit_film"]) && !isset($_POST['submit']))
// {
//     $editing = true;
//     $action="index.php?edit_film&id=".$_GET["id"];

//     include("include/user_film_edit.php");

// }else{
//   // include("include/user_film_list.php");
// }


// film list du coup (rajouter modales upload après stp)


function ellipsis($string, $limit, $repl) 
{
  if(strlen($string) > $limit)
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}


?>

<div class="container-xl first-content">


<a class="text-right mt-1 btn" href="" data-toggle="modal" data-target="#addFilmModal">Ajouter un film&nbsp;&nbsp;<i class="fas fa-plus" style="vertical-align: -0.065rem;"></i></a>

<table>
    <tr>
        <th class="bg-transparent"></th><th class="th-left">Pseudo</th><th>Prénom</th><th>Nom</th><th>Mail</th><th>Avatar</th><th class="th-right">Level</th><th class="bg-transparent"></th>
    </tr>
    <?php
    // $sql = 'SELECT * FROM films';
    // $stmt = $db->prepare($sql);
    // $stmt->execute();

    $user = $users;
    // foreach($users as $user)
    // {
    echo '
        <tr>
            <td>'.$user->getId_user().'</td>
            <td><b>'.$user->getUser_pseudo().'</b></td>
            <td>'.$user->getUser_firstname().'</td>
            <td>'.$user->getUser_lastname().'</td>
            <td>'.$user->getUser_mail().'</td>
            <td>'.$user->getUser_avatar().'</td>
            <td>'.$user->getUser_level().'</td>
        </tr>';
    // }
    // $stmt->closeCursor(); // Termine le traitement de la requête
    ?>
</table>

</div>

