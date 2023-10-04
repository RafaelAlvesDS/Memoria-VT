<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/dev/classes/config.php');

$topicosUser = $C_BD->GetAll('SELECT * FROM uol_threads	where AutorId = ' . $_GET['user']);

function clean($string) {
    
    setlocale(LC_CTYPE, 'pt_BR'); // Defines para pt-br
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
}
?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="album.css" rel="stylesheet">
        <title>Memória VT</title>
    </head>
    <body>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tópico</th>
                        <th scope="col">Posts</th>
                        <th scope="col">Fórum id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($topicosUser); $i++) { ?>
                        <tr>
                            <th scope="row"><?= $i + 1; ?></th>
                            <td><a href="https://web.archive.org/web/http://forum.jogos.uol.com.br/<?= clean($topicosUser[$i]['Titulo']); ?>_t_<?= $topicosUser[$i]['Id']; ?>" target="_blank"><?= $topicosUser[$i]['Titulo']; ?></a></td>
                            <td><?= $topicosUser[$i]['Posts']; ?></td>
                            <td><?= $topicosUser[$i]['ForumId']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>




    </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
