<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">List Products</span></h2>
        </div>

        <div class="main_container table-responsive-lg">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 100px;">STT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    // hiển thị danh sách sản phẩm từ cơ sở dữ liệu
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo '<th>' . $stt . "</th>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo '<td>0' . $row['phone'] . "</td>";
                        echo '<td style="width: 100px;">';
                        echo " <a href='delete-user.php?id=" . $row['id'] ."'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>