<?php
require_once 'db_config.php';
require_once 'user.php';

$db = new Database();
$userManager = new UserManager($db->conn);

// Handle form submissions
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

switch($action) {
    case 'edit':
        $user = $userManager->getUserById($id);
        break;
    case 'delete':
        $userManager->deleteUser($id);
        header("Location: index.php");
        exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing user
        $userManager->updateUser($_POST['id'], $name, $email);
    } else {
        // Create new user
        $userManager->createUser($name, $email);
    }
    header("Location: index.php");
    exit();
}

// Fetch all users
$users = $userManager->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Management System</h1>
        
        <form action="index.php" method="POST">
            <?php if (isset($user)): ?>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <?php endif; ?>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" 
                   value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>" 
                   required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>" 
                   required>
            
            <button type="submit">
                <?php echo isset($user) ? 'Update User' : 'Add User'; ?>
            </button>
        </form>

        <h2>Users List:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $user['id']; ?>" class="btn edit">Edit</a>
                            <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" 
                               class="btn delete" 
                               onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php 
$db->closeConnection(); 
?>