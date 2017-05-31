<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PT Teravin Technovations</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript">
        $.fn.extend({
            animateCss: function (animationName) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                });
            }
        });
    </script>
</head>
<body>

    <div class="container">
        <?php  
            if (isset($_GET['page'])) {
                if ($_GET['page']=="add") {
                    include 'content/add-user.php';
                }
                elseif ($_GET['page']=="view") {
                    include 'content/view-user.php';
                }
            }else{
                include 'content/list-user.php';
            }
        ?>
    </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/dataTables/jquery.dataTables.js"></script>
    <script src="assets/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
        $('#tableku').dataTable({
            "paging":   false,
            "ordering": false,
            "info": false
        });
      });
    </script>
</body>

</html>
