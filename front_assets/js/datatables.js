$(document).ready( function () {
	console.log("Hello");
	$('#dataTables-example').DataTable();
	$('#table_custom').DataTable();
	$('#free_order_table').DataTable();
	$('#table_regular').DataTable({
		"order": [[ 1, "desc" ]]
		});
});
