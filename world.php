<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'] ??'';
$lookup = $_GET['lookup']??'';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if ($lookup === 'cities')
  {
    $stmt = $conn -> query("SELECT c.name, c.district, c.population FROM cities c JOIN countries cs ON c.country_code = cs.code WHERE cs.name LIKE '%$country%'");
    $cities = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
      <tr>
        <th>Name</th>
        <th>DIstrict</th>
        <th>Population</th>
      </tr>
      <?php foreach ($cities as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['district']) ?></td>
        <td><?= htmlspecialchars($row['population']) ?></td>
      </tr>
      <?php endforeach; ?>
    <table>
    <?php
  }
else
  {
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
      <?php foreach ($results as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['continent']) ?></td>
        <td><?= htmlspecialchars($row['independence_year']) ?></td>
        <td><?= htmlspecialchars($row['head_of_state']) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <?php
  }
