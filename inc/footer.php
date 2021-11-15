<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  $('#appointmentTable').DataTable({
    "scrollX": true
  });
});
//   $(document).ready(function() {
// 		$("#appointmentTable thead tr").clone(true).appendTo("#appointmentTable thead");
// 		$("#appointmentTable thead tr:eq(1) th").each(function(i) {
// 		    var title = $(this).text();
// 		    $(this).html("<input type='text' placeholder='Search "+title+"'>");
// 		    $("input", this).on("keyup change", function() {
// 		        if (appointmentTable.column(i).search() !== this.value) {
// 		            appointmentTable
// 		                .column(i)
// 		                .search(this.value)
// 		                .draw();
// 		        }
// 		    });
// 		});

// 		var appointmentTable = $("#appointmentTable").DataTable({
// 			"orderCellsTop": true,
// 			"fixedHeader": true,
// 			"scrollX": true
// 		});
//   });
</script>
</body>
</html>
