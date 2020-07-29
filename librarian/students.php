<?php include('header.php') ;
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="">Students</a></li>

        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <h4 class="section-subtitle"><b>Students Oweview</b></h4>
    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered border" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Batch</th>
                            <th>ID</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../include/db.php');
                        $sql = "SELECT * FROM `students` ORDER BY `id` DESC ";
                        $result =mysqli_query($con,$sql);
                        while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?= $row['name']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['batch']?></td>
                            <td><?= $row['uid']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['status'] == 1 ? 'Active' : 'Inactive'?></td>
                            <td>
                                <?php 
                            if($row['status'] == 1){ ?>
                                <a href="status_inactive.php?id=<?= $row['id']?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                <?php  }else {  ?>

                                <a href="status_active.php?id=<?= $row['id']?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>