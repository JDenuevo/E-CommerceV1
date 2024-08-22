<?php
include 'dbconn.php'; // Adjust path as needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Classroom Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <form method="POST" action="functions/add.php">
        <h1>Add a Student</h1>
        
        <div class="row">
            <div class="col-6">
                <label for="name">Name</label>
                <input class="form-control my-1" type="text" name="name" placeholder="Enter name" required>

                <label for="email">Email</label>
                <input class="form-control my-1" type="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="col-6">
                <label for="age">Age</label>
                <input class="form-control my-1" type="number" name="age" placeholder="Enter age" required>
                
                <label for="contact">Contact</label>
                <input class="form-control my-1" type="text" name="contact" placeholder="Enter contact number" maxlength="12" required>
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary rounded-pill w-50 my-5">Submit</button>
        </div>
    </form>

    <div class="table-responsive">
        <h1>List Student</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th hidden>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                ?>
                <tr>
                    <td hidden><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact']); ?></td>
                    <td>
                        <!-- Update Button -->
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>
                        
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="functions/update.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="mb-3">
                                        <label for="updateName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="updateName" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateAge" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="updateAge" name="age" value="<?php echo htmlspecialchars($row['age']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="updateEmail" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateContact" class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="updateContact" name="contact" maxlength="12" value="<?php echo htmlspecialchars($row['contact']); ?>" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this student?</p>
                                <form method="POST" action="functions/delete.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No students found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
