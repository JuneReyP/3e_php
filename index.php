<?php include 'header.php'; 

if(!isset($_SESSION['logged_in'])){
    header("location: login.php");
    ob_end_flush();
}
?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-4 shadow mt-4 p-3">
                <!-- alert message -->
                <?php if (isset($_GET['msg'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= $_GET['msg']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <?php
                if (isset($_GET['edit'])) { ?>

                    <?php
                    $id = $_GET['id'];
                    $dataUp = $conn->prepare("SELECT * FROM personal_info WHERE p_id = ?");
                    $dataUp->execute([$id]);

                    foreach ($dataUp as $up) { ?>
                        <form action="process.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $up['p_id'] ?>">
                            <div class="mb-3">
                                <label for="fname">Firstname</label>
                                <input type="text" class="form-input" id="fname" name="firstname" value="<?= $up['fname'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="lname">Lastname</label>
                                <input type="text" class="form-input" id="lname" name="lastname" value="<?= $up['lname'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-input" id="address" name="address" value="<?= $up['address'] ?>">
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-warning" type="submit" name="updateData">Update</button>
                            </div>

                        </form>
                    <?php } ?>

                <?php } else { 
                    // echo $_SESSION['u_id'];
                    ?>
                
                    <form action="process.php" method="post">
                        <input type="hidden" name="userID" value="<?= $_SESSION['u_id'] ?>">
                        <div class="mb-3">
                            <label for="fname">Firstname</label>
                            <input type="text" class="form-input mb-3" id="fname" name="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lname">Lastname</label>
                            <input type="text" class="form-input mb-3" id="lname" name="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-input mb-3" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit" name="addData">Add</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="table shadow mt-4 p-2">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $user = $_SESSION['u_id'];
                            $getData = $conn->prepare("SELECT * FROM personal_info WHERE u_id = ?");
                            $getData->execute([$user]);
                            $cnt = 1;
                            foreach ($getData as $data) { ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $data['fname'] ?></td>
                                    <td><?= $data['lname'] ?></td>
                                    <td><?= $data['address'] ?></td>
                                    <td><a href="index.php?edit&id=<?= $data['p_id'] ?>" class="text-decoration-none">✏️</a> | <a href="process.php?delete&id=<?= $data['p_id'] ?>" class="text-decoration-none">❌</a></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>