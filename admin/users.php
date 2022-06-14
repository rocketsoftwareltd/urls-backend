<?php require_once "./layout/header.php" ?>      
<?php require_once "./layout/sidebar.php" ?>   

<?php // require "../app/models/Admin.php"; ?>       
    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
          </span> Users
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>All Users <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                <table class="table table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Links</th>
                        <th>Group</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $admin = new Admin;
                            $users = $admin->getUsers();
                            while($row =  $users->fetch_assoc()){
                                $num_links = $admin->get_num_user_link($row['id']);
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                                        <td>'.$row["email"].'</td>
                                        <td>'.$num_links.'</td>
                                        <td>'.$row["group"].'</td>
                                        <td>'.$row["created_at"].'</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                            <a href="" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil-box-outline"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>';
                            }
                         
                        ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
      </div>

      
    </div>
    <!-- content-wrapper ends -->

  <?php require_once "./layout/footer.php" ?>       
  
          