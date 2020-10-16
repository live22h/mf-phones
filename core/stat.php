<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Дата</th>
      <th scope="col">IP</th>
      <th scope="col">Запрос</th>
    </tr>
  </thead>
  <tbody>

  <?php
    spl_autoload_register();
    $request = new Request();
    
    $db = new PDO('sqlite:db/mf-phones.db');

    $q = $db->query('select * from stat as q order by q.timestamp');
    $result = $q->fetchAll(PDO::FETCH_CLASS);

    foreach ($result as $v) {
        echo "<tr><th scope=row>$v->id</th><td>$v->timestamp</td><td>$v->ip</td><td>$v->data</td></tr>";
    }

    
?>
</table>


</body>
</html>