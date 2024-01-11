<?php
include('../middLeware/adminMiddleware.php');
include('includes/header.php');
?>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 rounded px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a
                                    class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
                                    href="index.php">
                                    <div class="text-white text-center ms-5 me-2 d-inline align-items-center justify-content-center">
                                        <span class="nav-link-text text-center ms-1">SBS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100">
                                <a
                                    class="nav-link text-white <?= $page == 'index.php' ? "active bg-gradient-primary" : ""; ?> "
                                    href="index.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">table_view</i>
                                    </div>
                                    <span class="nav-link-text ms-1"> All Users</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'adduser.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="adduser.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">add</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Add User</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'tasks.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="tasks.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">table_view</i>
                                    </div>
                                    <span class="nav-link-text ms-1"> All Tasks</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="nav-link text-white <?= $page == 'addtask.php' ? "active bg-gradient-primary" : ""; ?>"
                                    href="addtask.php">
                                    <div
                                        class="text-white text-center me-2 d-inline align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">add</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Add Task</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="sidenav-footer  w-100 bottom-0 ">
                    <div class="mx-3">
                        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col py-3">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between container">
                                <h4 class="mt-3">All Tasks</h4>
                                <a href="addtask.php" class="col-3 btn btn-sm btn-success mt-3">Add New</a>
                            </div>
                            <div class="card-body">
                                <table name="example" id="example"
                                    class="table table-bordered table-striped display nowrap" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>BRANCH</th>
                                            <th>ISSUE REPORTED/TASK</th>
                                            <th>REMARKS</th>
                                            <th>HARDWARE USED</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>TEAM</th>
                                            <th class="col-dt-hidden">EDIT</th>
                                            <th class="col-dt-hidden">DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tasks = getAll("tasks");
                                        $task = mysqli_fetch_array($tasks);
                                        if (mysqli_num_rows($tasks) > 0) {
                                            foreach ($tasks as $item) {
                                                ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <?= $item['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['branch']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['task']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['remarks']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $item['hardware_used']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($item['status'] == '1') {
                                                            ?>
                                                            <span class="badge bg-success">Done</span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="badge bg-secondary">Pending</span>
                                                            <?php
                                                        } ?>
                                                    </td>

                                                    <td>
                                                        <?= $item['date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $users = getById("users", $item['user_id']);
                                                        if (mysqli_num_rows($users) > 0) {
                                                            foreach ($users as $items) {
                                                                ?>
                                                                <span>
                                                                    <?= $items['name'] ?>
                                                                </span>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo "All";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="edittask.php?id=<?= $item['id']; ?>"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger btn-sm"
                                                            href='./code1.php?id=<?php echo ($item['id']); ?>'>Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "No Records Found";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>

    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ],

        });
    });
    $.extend($.fn.dataTable.ext.buttons.pdfHtml5, {

        exportOptions: { columns: getExportOptions() },

        footer: true
    });

    $.extend($.fn.dataTable.ext.buttons.excelHtml5, {

        exportOptions: { columns: getExportOptions() },

        footer: true
    });


    function getExportOptions() {
        return [function (idx, data, node) {
            if ($(node).hasClass('col-dt-hidden')) {
                return false;
            }
            return true;
        }
        ];
    }

</script>