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
        <th class="bg-transparent"></th><th class="th-left">Poster</th><th>Titre</th><th>Année</th><th>Durée</th><th>Synopsis</th><th class="th-right">Genre.s</th><th class="bg-transparent"></th>
    </tr>
    <?php
    // $sql = 'SELECT * FROM films';
    // $stmt = $db->prepare($sql);
    // $stmt->execute();

    foreach($films as $film)
    {
    echo '
        <tr>
            <td>'.$film->getId_film().'</td>
            <td class="td-poster"><img src="'.$film->getFilm_poster().'"></td>
            <td><b>'.$film->getFilm_title().'</b></td>
            <td>'.$film->getFilm_date().'</td>
            <td>'.$film->getFilm_length().'</td>
            <td>'.ellipsis($film->getFilm_synopsis(), 250, "(...)").'</td>
            <td>';
            // $stmt_genre =   $db->prepare("SELECT id_genre FROM is_genre WHERE id_film=$film->id_film");
            // $stmt_genre->execute();
            // while( $y = $stmt_genre->fetch(PDO::FETCH_OBJ) ) {
            //     $stmt_genre_name=$db->prepare("SELECT genre_name FROM genres WHERE id_genre=".$y->id_genre);
            //     $stmt_genre_name->execute();
            //     while( $z=$stmt_genre_name->fetch(PDO::FETCH_OBJ) ) {
            //             echo "<span>$z->genre_name</span><br>";
            //     }
            // }            

    echo    '</td><td><a class="btn" href="userpanel.php?edit_film&id='.$film->getId_film().'">EDIT</a></td>
        </tr>
    ';
    }
    // $stmt->closeCursor(); // Termine le traitement de la requête
    ?>
</table>

</div>

