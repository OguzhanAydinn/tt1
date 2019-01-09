<?php /* Smarty version 2.6.30, created on 1546637401
         compiled from footer_scripts.html */ ?>


<!--   Core JS Files   -->
<script src="../../tt1/js/jquery.min.js" type="text/javascript"></script>
<script src="../../tt1/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../tt1/js/material.min.js" type="text/javascript"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../tt1/js/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="../../tt1/js/jquery.validate.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../tt1/js/moment.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../tt1/js/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../tt1/js/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../../tt1/js/bootstrap-notify.js"></script>
<script src="../../tt1/js/bootstrap-selectpicker.js"></script>

<!--   Sharrre Library    -->
<script src="../../tt1/js/jquery.sharrre.js"></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../../tt1/js/bootstrap-datetimepicker.js"></script>
<script src="../../tt1/js/bootstrap-datetimepicker.min.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../tt1/js/nouislider.min.js"></script>


<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../../tt1/js/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../tt1/js/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../tt1/js/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../tt1/js/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../tt1/js/fullcalendar.min.js"></script>

<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../../tt1/js/jquery.tagsinput.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../../tt1/js/material-dashboard-v=1.3.0.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../tt1/js/demo.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			demo.initFormExtendedDatetimepickers();
		});
	</script>






<script type="text/javascript">
    $(document).ready(function () {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });


      var table = $('#datatables').DataTable();

      // Edit record
      table.on('click', '.edit', function () {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function (e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

    });
</script>



<script type="text/javascript">
    $().ready(function () {
      demo.checkFullPageBackgroundImage();

      setTimeout(function () {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700)
    });
</script>