<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="jumbotron">

    </div>

    <section id="departments">
        <?php
        $db = new PDO('sqlite:db/mf-phones.db');
        $q = $db->query('select q.id, q.fam, q.name, q.otch, p.name as post, d.name as dept, q.phone from person as q join post as p on q.post = p.id join department as d on q.department = d.id order by  q.fam, q.name, q.otch');
        $results = $q->fetchAll();
        
        ?>

    </section>

    <section id="phones">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Должность</th>
                    <th scope="col">Телефон</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $row) {
                echo '<tr><th scope="row">'.$row["fam"].'</th><td>'.$row["name"].'</td><td>'.$row["otch"].'</td><td>'.$row["phone"].'<td>'.$row["post"].'</td></tr>';
            }
            ?>
            
            </tbody>
        </table>
    </section>
</body>

</html>

<!-- 
<?php
$st = $db->query('SELECT * FROM post');
$results = $st->fetchAll();
?> -->