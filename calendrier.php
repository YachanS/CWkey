<?php 
include('config/bdd.php');
include('include/head.php'); 

session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$curdate = date("Y-m-d");

function dateF($s){
  $dt = new DateTime($s);

  $date = $dt->format('Y-m-d');

  return $date;
}

?>

<head>
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
	
<script>

var curdate = <?php $curdate; ?>

  $(document).ready(function() {
    $('#calendar').fullCalendar({
      defaultDate: curdate,
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
      <?php
        $sql = 'SELECT * FROM reservation where paid = 1' ;
        $req = $bdd->prepare($sql);
        $req->execute();
        while($row = $req->fetch()) {
      ?>
        {
          title: '<?php echo $row['libelle'] ?>',
          start: '<?php echo dateF($row['dateDeb']) ?>',
          end: '<?php echo dateF($row['dateFin']) ?>'
        },
        <?php
      }
      ?>
      ]
    });
  });

</script>

</head>

<body>

<?php include('include/leftsidebar.php'); ?>


<?php include('include/header.php'); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Calendrier des reservations</h1>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
<div id='calendar'></div>
</div>

</body>

<?php include('include/footer.php'); ?>