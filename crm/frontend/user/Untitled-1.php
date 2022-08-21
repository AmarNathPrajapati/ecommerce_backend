<main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-5 mb-5">
                        <?php
                        $stmt = "SELECT id,title,description,file,file_type,active,created_at FROM product WHERE deleted_at IS NULL ORDER BY created_at DESC";
                        $sql = mysqli_prepare($conn, $stmt);
                        $result = mysqli_stmt_execute($sql);

                        if ($result) {
                            $data = mysqli_stmt_get_result($sql);
                            $sno = 1;
                            if ($data->num_rows > 0) {
                                # code...
                                while ($row = mysqli_fetch_array($data)) {
                        ?>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-3">
                                        <div class="card shadow border-0 overflow_style" style="height: 100%;">
                                            <div class="card-body" style="position:relative;">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                    </div>
                                                    <div class="col-12 mt-4 text-center ">
                                                        <span class="h3 font-bold  d-block mb-2"><?php echo $row["title"]; ?></span>
                                                        <p class="h6" style="width: 300px; margin: auto; text-align: justify; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo $row["description"]; ?>
                                                        </p>

                                                        <div class="mt-5">
                                                            <div style="float: left;">
                                                                <?php echo $row["created_at"]; ?>
                                                            </div>

                                                            <div style="float: right;display:flex;">
                                                                <form action="./edit_product.php" method="get"><input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                                                    <input type="number" name="active" value="<?php echo $row["active"]; ?>" hidden> <input type="text" name="file" value="<?php echo $row["file"]; ?>" hidden>
                                                                    <input type="text" name="title" value="<?php echo $row["title"]; ?>" hidden> <input type="text" name="old_file_type" value="<?php echo $row["file_type"]; ?>" hidden>
                                                                    <input type="text" name="description" value="<?php echo $row["description"]; ?>" hidden> <button class="btn btn-neutral text-warning p-2" type="submit" style="margin-right:7px; font-size:12px;"><i class="bi bi-pencil"></i></button>
                                                                </form>
                                                                <form action="../../backend/user/remove_product.php" method="post"><input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden> <button class="btn btn-neutral text-danger p-2" style="font-size:12px;"><i class="bi bi-trash"></i></button></form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php echo $row["active"] == 1 ? "<span class='badge bg-primary'>Active</span>" : "" ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?><p class="pt-3">Nothing to show...</p><?php
                                                                    }
                                                                }

                                                                        ?>
                    </div>
                </div>
            </main>