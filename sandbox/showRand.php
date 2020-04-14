<!DOCTYPE html>
<html>

<head>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
$(document).ready(function() { /// Wait till page is loaded
   $(document).on('click', '.heart', function(){
      var id = $(this).attr('id').replace(/likebtn-/, '');
          console.log(id);
      $('#count-'+id).load('randr.php', function() {         
      });
   });
});
  </script>
</head>

<body>

  <div id="count-1"><?php include 'randr.php'; ?></div>
  <div id="count-2"><i class="icon-heart-empty heart" id="likebtn-2"></i>69</div>
</body>

</html>