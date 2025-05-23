<?php
include('person.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['id']) && $_POST['id'] !== '') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];

    Update($id, $name, $city);
  } else {
    $name = $_POST['name'];
    $city = $_POST['city'];

    Add($name, $city);
  }

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

$persons = GetAll();


?>

<!DOCTYPE html>
<html>

<head>
  <title>Person Page</title>
  <style>
    table {
      border-collapse: collapse;
      width: 25%;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    form.inline {
      display: inline;
    }
  </style>
</head>

<body style="background-color: grey;">
  <form action="" method="post">
    <label for="">Id</label>
    <input type="text" name="id"><br>
    <label for="">Name</label>
    <input type="text" name="name" required><br>
    <label for="">City</label>
    <input type="text" name="city" required><br><br>
    <button>Add</button>
  </form>

  <h2>All Users</h2>
  <?php if (count($persons) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
      </tr>
      <?php for ($i = 0; $i < count($persons); $i++) { ?>
        <tr>
          <td><?= $persons[$i]['Id'] ?></td>
          <td><?= $persons[$i]['Name'] ?></td>
          <td><?= $persons[$i]['City'] ?></td>
        </tr>
      <?php } ?>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>
</body>

</html>