<?php
include 'person.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['Id']) && $_POST['Id'] !== '') {
    $Id = $_POST['Id'];
    $City = $_POST['City'];
    $Name = $_POST['Name'];

    updateUser($Id, $Name, $City);
  } else {
    $City = $_POST['City'];
    $Name = $_POST['Name'];

    insertUser($Name, $City);
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

// Fetch all users
$users = getAllUsers();
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Management</title>
  <style>
    table {
      border-collapse: collapse;
      width: 60%;
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

<body>

  <h2>Add New User</h2>
  <form method="POST">
    <input type="text" name="Id" placeholder="Id"><br>
    <input type="text" name="Name" placeholder="Name"><br>
    <input type="text" name="City" placeholder="City"><br>
    <button type="submit" name="add">Add</button>
  </form>

  <h2>All Users</h2>
  <?php if (count($users) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
      </tr>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user['Id'] ?? '') ?></td>
          <td><?= htmlspecialchars($user['Name'] ?? '') ?></td>
          <td><?= htmlspecialchars($user['City'] ?? '') ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>

</body>

</html>