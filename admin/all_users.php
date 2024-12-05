<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require '../helpers/init_conn_db.php'; ?>

<?php
if(isset($_POST['del_user']) and isset($_SESSION['adminId'])) {
  $user_id = $_POST['user_id'];
  $sql = 'DELETE FROM users WHERE user_id=?';
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
      header('Location: ../index.php?error=sqlerror');
      exit();            
  } else {  
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    echo("<script>location.href = 'all_users.php';</script>");
    exit();
  }
}
?>

<style>
table {
  background-color: white;
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
body {
  background-color: #efefef;
}
th {
  font-size: 22px;
}
td {
  margin-top: 10px !important;
  font-size: 16px;
  font-weight: bold;
  font-family: 'Assistant', sans-serif !important;
}

.table-dark {
  text-align: center;
}
</style>
<main>
    <div class="container-md mt-2">
        <h1 class="display-4 text-center text-secondary">QUẢN LÝ KHÁCH HÀNG</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Tài Khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Hoạt Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT user_id, username, email FROM users';
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);                
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr class='text-center'>                  
                        <td>".$row['user_id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <form action='all_users.php' method='post'>
                                <input name='user_id' type='hidden' value=".$row['user_id'].">
                                <button class='btn' type='submit' name='del_user'>
                                    <i class='text-danger fa fa-trash'></i>
                                </button>
                            </form>
                        </td>                  
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
