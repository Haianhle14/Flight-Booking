<!-- file: statistical_ticket.php -->

<?php include_once 'header.php'; ?>
<?php include_once 'footer.php'; ?>
<?php require '../helpers/init_conn_db.php'; ?>

<style>
/* Thêm các style cần thiết */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

body {
  background-color: #efefef;
  font-family: 'Roboto', sans-serif;
}

h1 {
  margin-top: 20px;
  margin-bottom: 20px;
  font-family: 'Arial';  
  font-size: 45px !important; 
  font-weight: lighter;
}

a:hover {
  text-decoration: none;
}

table {
  background-color: white;
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 10px;
}

th {
  font-size: 18px;
  font-weight: 500;
  color: #555;
}

td {
  font-size: 16px;
  font-weight: 400;
  color: #333;
}

.table {
  text-align: center;
  margin-top: 20px;
}

p.text-center {
  font-size: 18px;
  color: #666;
  font-weight: 400;
}
</style>


<main>
    <div class="container-md mt-2">
        <?php
        // Lấy ngày bắt đầu và ngày kết thúc từ biểu mẫu
        $source_date = isset($_POST['source_date']) ? $_POST['source_date'] : '';
        $dest_date = isset($_POST['dest_date']) ? $_POST['dest_date'] : '';

        // Hiển thị tiêu đề với thông tin khoảng thời gian đã chọn
        if ($source_date && $dest_date) {
            echo '<h1 class="display-4 text-center text-secondary">Thống Kê Vé từ ' . $source_date . ' đến ' . $dest_date . '</h1>';
        } else {
            echo '<h1 class="display-4 text-center text-secondary">Thống Kê Vé</h1>';
        }
        ?>

        <?php
        // Kiểm tra nếu dữ liệu được gửi từ biểu mẫu
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
            $source_date = $_POST['source_date'];
            $dest_date = $_POST['dest_date'];

            // Truy vấn dữ liệu từ bảng `ticket` kết hợp với `flight`, `users` và `passenger_profile`
            $sql = "
                SELECT 
                    t.ticket_id AS ticket_id, 
                    f.destination AS destination,
                    f.source AS source,
                    u.username AS username,  -- Lấy 'username' từ bảng 'users'
                    p.mobile AS mobile,      -- Lấy 'mobile' từ bảng 'passenger_profile'
                    t.cost AS cost,
                    t.created_at AS created_at
                FROM 
                    ticket t
                JOIN flight f ON t.flight_id = f.flight_id
                JOIN users u ON t.user_id = u.user_id  -- Kết nối với bảng 'users' qua 'user_id'
                JOIN passenger_profile p ON t.passenger_id = p.passenger_id  -- Kết nối với bảng 'passenger_profile'
                WHERE t.created_at BETWEEN ? AND ?
                ORDER BY t.ticket_id ASC";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $source_date, $dest_date);
            $stmt->execute();
            $result = $stmt->get_result();

            // Kiểm tra kết quả truy vấn
            if ($result->num_rows > 0) {
                echo '<table class="table table-bordered">';
                echo '<thead>
                        <tr>
                            <th>ID Vé</th>
                            <th>Điểm Đi</th>
                            <th>Điểm Đến</th>
                            <th>Tên Người Dùng</th>
                            <th>Số Điện Thoại</th>
                            <th>Chi Phí</th>
                            <th>Ngày Tạo</th>
                        </tr>
                      </thead>';
                echo '<tbody>';

                // Hiển thị từng dòng dữ liệu
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['ticket_id'] . '</td>
                            <td>' . $row['source'] . '</td>
                            <td>' . $row['destination'] . '</td>
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['mobile'] . '</td>
                            <td>' . $row['cost'] . '</td>
                            <td>' . $row['created_at'] . '</td>
                          </tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="text-center">Không tìm thấy vé nào trong khoảng thời gian này.</p>';
            }
        } else {
            echo '<p class="text-center">Vui lòng chọn khoảng thời gian để tìm kiếm.</p>';
        }
        ?>
    </div>
</main>
