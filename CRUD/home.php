<!DOCTYPE html>
<html>

<head>
  <title></title>
  <?php include 'links.php' ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .main-div {
      width: 98%;
      border-radius: 20px;
      margin: auto;
      background-color: #fff;
      padding: 20px;
      margin-top: 50px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
      margin-bottom: 50px;
    }

    h1 {
      text-align: center;
      color: #333333;
      font-family: 'Dancing Script', cursive;
      font-size: 35px;
      margin-top: 18px;
    }

    .center-div {
      border-radius: 5px;
      width: 100%;
      margin-top: 20px;
      overflow-x: auto;
    }

    table {
      width: 100%;
      background-color: #ffffff;
      box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.03);
      margin: auto;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      color: grey;
    }

    td {
      font-size: 15px;
      font-family: Arial, Helvetica, sans-serif;
    }

    th {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .fa {
      cursor: pointer;
      font-size: 20px;
      margin: 0 5px;
    }

    .fa-edit {
      color: #007bff;
    }

    .fa-trash {
      color: #dc3545;
    }

    ul {
      margin-top: 30px;
    }

    .page-link{
      color: black;
      background-color: white;
    }

    li{
      padding: 5px;
      font-size: 15px;
      font-style: Arial, Helvetica, sans-serif;;
    }

    .page-item.active .page-link{
      background-color: #4CAF50;
      border-color: #4CAF50;
    }

    a{
      border-radius: 50%;
    }

    li{
       font-size: 15px;
    }

  </style>
</head>

<body>
  <div class="main-div">
    <h1>List of candidates for Lead-Photographer<h1>
        <div class="center-div">
          <div class="table-responsive">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Website</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Refer</th>
                  <th>Experience</th>
                  <th colspan="2">Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $username = "root";
                $password = "";
                $server = 'localhost';
                $db = 'crudop';

                $con = mysqli_connect($server, $username, $password, $db);

                $limit = 3;
                $page = 0;
                $current_page = 1;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                  $current_page = $page;
                  $page--;
                  $page = $page * $limit;
                }

                $total_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM registration"));
                $total_pages = ceil($total_records / $limit);

                $selectquery = " SELECT * from registration LIMIT $page, $limit";

                $query = mysqli_query($con, $selectquery);
                
                while ($res = mysqli_fetch_array($query)) {

                  ?>
                  <tr>
                    <td>
                      <?php echo $res['ID'] ?>
                    </td>
                    <td>
                      <?php echo $res['Name'] ?>
                    </td>
                    <td>
                      <?php echo $res['Website'] ?>
                    </td>
                    <td>
                      <?php echo $res['Mobile'] ?>
                    </td>
                    <td>
                      <?php echo $res['Email_Id'] ?>
                    </td>
                    <td>
                      <?php echo $res['Refer'] ?>
                    </td>
                    <td>
                      <?php echo $res['Experience'] ?>
                    </td>
                    <td><a href="update.php?id=<?php echo $res['ID'] ?>" data-toggle="tooltip" data-placement="bottom"
                        title="UPDATE">
                        <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    <td><a href="delete.php?id=<?php echo $res['ID'] ?>" data-toggle="tooltip" data-placement="bottom"
                        title="DELETE">
                        <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
            <ul class="pagination pagination-flush">
                <?php
               
                for ($i = 1; $i <= $total_pages; $i++) {
                  $class = '';
                  if ($current_page == $i) {
                    $class = 'active';
                  }

                  ?>
                  <li class="page-item <?php echo $class?>"><a class="page-link" href="?page=<?php echo $i ?>">
                      <?php echo $i ?>
                    </a></li>
                  <?php
                }
                ?>
            
                </ul>
          </div>
        </div>
  </div>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>