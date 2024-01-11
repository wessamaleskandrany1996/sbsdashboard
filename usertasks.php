<?php 
session_start();
    include("functions/userfunctions.php");
    include("includes/header.php");
    include("auth.php");
?>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>


    <div class="py-5">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                    <table name="example" id="example" class="table table-bordered table-striped display nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>BRANCH</th>
                                    <th>TASK</th>
                                    <th>REMARKS</th>
                                    <th>HARDWARE USED</th>
                                    <th>STATUS</th>
                                    <th class="col-dt-hidden">EDIT</th>
                                </tr>
                            </thead>
                            <tbody>      
                                <?php
                                    $tasks =  getUserTasks();
                                    if (mysqli_num_rows( $tasks)) {
                                        foreach ($tasks as $item){
                                        ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['branch']; ?></td>
                                                <td><?= $item['task']; ?></td>
                                                <td><?= $item['remarks']; ?></td>
                                                <td><?= $item['hardware_used']; ?></td>
                                                <td><?php if ($item['status'] == '1') {
                                                    ?>
                                                    <span class="badge bg-success">Done</span>
                                                <?php
                                                }else{
                                                    ?>
                                                    <span class="badge bg-secondary">Pending</span>
                                                <?php } ?></td>
                                                <td>
                                                    <?php $user_id = $_SESSION['auth_user']['user_id']; ?>
                                                    <a href="edittask.php?id=<?= $item['id']; ?>" <?= $item['user_id'] == $user_id ? '' : 'style="display:none"' ?>  class="btn btn-sm btn-secondary">Edit</a>
                                                    <a href="assigntask.php?id=<?= $item['id']; ?>" <?= $item['user_id'] == $user_id ? 'style="display:none"' : '' ?>  class="btn btn-sm btn-success">Assign</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="7">No Tasks Yet </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf'
        ],

    } );
} );
$.extend( $.fn.dataTable.ext.buttons.pdfHtml5, {
	
	exportOptions:  { columns:	getExportOptions()},
	
	footer: true
});

$.extend( $.fn.dataTable.ext.buttons.excelHtml5, {
	
	exportOptions:  { columns:	getExportOptions()},
	
	footer: true
});


function getExportOptions()
{	
	return [function ( idx, data, node ) 
	{
        if($(node).hasClass('col-dt-hidden')) 
        {
          return false;
        }
        return true;
      }
	];
}

</script>