<?php
include('../middleware/adminMiddleware.php');
include('./includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getByID('categories', $id);

                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4 class="text-white">Edit Category
                                <a href="category.php" class="btn btn-dark float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="./code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label class="mb-0">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data['image'] ?>" width="50px" height="50px" alt="<?= $data['name'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="Enter Meta Title" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Description</label>
                                        <textarea rows="3" name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2"><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2"><?= $data['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Hide</label>
                                        <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Popular</label>
                                        <input type="checkbox" <?= $data['popular'] ? "checked" : "" ?> name="popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo 'Uh-oh! Category not found';
                }
            } else {
                echo "Uh-oh! Something went wrong!";
            }
            ?>

        </div>
    </div>

    <?php include('./includes/footer.php'); ?>