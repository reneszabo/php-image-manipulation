<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Rene Ramirez - PHP Image</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    body > header{
      min-height: 100px;
    }
  </style>
</head>
<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          Rene Ramirez - PHP Images Assignment
        </a>
      </div>
        <form id="form" method="post" action="php-images.php" enctype="multipart/form-data" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="file" size="32" name="myimg" value="" />
          </div>
          <button type="submit" name="Submit" class="btn btn-default" >Submit Image</button>
        </form>
    </div>
  </nav>
</header>
<div class="container">
  <section id="image-result">
    <legend>NORMAL</legend>
    <section id="file-uploaded">
    </section>
    <legend>Resize</legend>
    <section>
      <h4>Resize 25%</h4>
      <section id="file-25">
      </section>
      <h4>Resize 50%</h4>
      <section id="file-50">
      </section>
    </section>
    <legend>Quality</legend>
    <section>
      <h4>Quality 5</h4>
      <section id="file-q-5">
      </section>
      <h4>Quality 50</h4>
      <section id="file-q-50">
      </section>
    </section>
    <legend>Watermark</legend>
    <section id="file-watermark">
    </section>
  </section>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" >
  var form;
  $(document).on('submit', function (e) {
    e.preventDefault();
    console.log('FORM SUBMITED',e.target);
    form = e.target;
    getImage($('#file-uploaded'),1);
    getImage($('#file-25'),2);
    getImage($('#file-50'),3);
    getImage($('#file-q-5'),4);
    getImage($('#file-q-50'),5);
    getImage($('#file-watermark'),6);
  });
  function getImage(target,type){
    var formData = new FormData(form);
    formData.append('type', type);
    $.ajax({
      url: form.action,
      method: form.method,
      processData: false,
      contentType: false,
      data: formData,
      processData: false,
      success: function(data){
        if(data.data != undefined){
          target.html('<img src="data:image/jpg;base64,'+data.data+'" />');
          target.append('<p><b>Width:</b> '+ data.width +'px');
          target.append('<p><b>Height:</b> '+ data.height +'px');
        }
      }
    });
  }
</script>
</body>
</html>