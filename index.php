<?PHP
include 'desktop/header.php';
include 'desktop/menu.php';
include 'lenguajes/espanol.php';
include 'scripts/mobileDetect.php';
include 'scripts/redirect.php';
if(class_exists('Mobile_Detect'))
{ $detect = new Mobile_Detect();
  $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
}
header_desktop("".$txt["titulo"]."");
?>
<script>
function limpiarNombre(){
  var nombre = document.getElementById('nombre').value;
  if(nombre=="Acorta tu URL"){
    document.getElementById('nombre').value = "";
  }
}
function openDialog(){
  $("#cargando").dialog("open");
  $("#cargando").dialog('option', 'title', 'Cargando');
  var loadStats = '<div class="Knight-Rider-loader animate">';
	    loadStats += '<div class="Knight-Rider-bar"></div>';
	    loadStats += '<div class="Knight-Rider-bar"></div>';
	    loadStats += '<div class="Knight-Rider-bar"></div>';
	    loadStats += '</div>';
  $("#cargando").html("Realizando Proceso....Por favor Espere<br /><br />"+loadStats);
}
function acortar(){
  openDialog();
  if(($("#nombre").val().indexOf("http://")!="-1" || $("#nombre").val().indexOf("https://")!="-1" || $("#nombre").val().indexOf("www.")!="-1") && $("#nombre").val().indexOf(".")!="-1" && $("#nombre").val().length>6){
    var parametros = { url:$("#nombre").val() };
	$.ajax({data:  parametros,
		url:   "scripts/acortador.php",
		type:  "GET",
		success:  function (response) {
		  obj = JSON.parse(response);
		  if(obj.shrink){
		    $("#nombre").val("http://bbo.st/"+obj.shrink+"");
		    $("#nombre").css("color","green");
		  } else {
		    alert("ERROR Inténtelo más tarde.");
		  }
                  $("#cargando").dialog("close");
		} , error: function(response){
		  alert("ERROR Inténtelo más tarde.");
                  $("#cargando").dialog("close");
		}
        });
  } else {
    alert("URL Incorrecta");
    $("#cargando").dialog("close");
  }
}
</script>
<script>
$(document).ready(function(){
  $(function() {
    $("#cargando").dialog({
		  autoOpen: false,
		  position: {my: "center", at: "center", to: window},
		  modal: true,
    });
  });
});

</script>
</head>
<?PHP
if($deviceType=="phone"){
  ?>
  <br /><br /><br />
  <?PHP
} 
?>
<body id="_susbribir">
<?PHP
  if($deviceType=="phone"){
    ?>
	      <div style="width: 100%;" class="container_wapper">
		<div style="width: 100%;" id="_banner_menu">
		  <div style="width: 100%;" class="container-fluid">	

                  </div>
		  <div style="text-align: center; vertical-align: middle;" class="col-xs-12 visible-xs"> 
                    <a href="http://bamboostr.com"><img style="padding-top: 1em; width: 10%;" src="http://letstweet.me/images/logo-bamboostr.png" /></a>
                    <a href="http://bamboostr.com"><img style="padding-top: 1em; width: 40%;" src="http://letstweet.me/images/texto-bamboostr.png" /></a>
                    
                  </div>
		</div>
	      </div>
    <?PHP
  }
?>

<div style="top: 0em;" id="_contact" class="container_wapper">
  <div class="container-fluid">
    
    <div style="text-align: center; top: 2em;" class="col-xs-12">
      <img style="width: 70%;" src="images/vende-mas-con-redes-sociales.png" />
      <img style="width: 60%;" src="images/impulsar-tus-ideas.png" />
    </div>
    
    <div style="text-align: center;" class="col-xs-12">
      <div style="text-align: center; width: 100%;">
      </div>
    </div>

    <div class="col-xs-12" style="text-align: center;">
      <div style="text-align: center; width: 100%;">
<?PHP
if($deviceType=="phone"){
  ?>
        <div style="background: url('images/newsletter_mobile2.png') no-repeat scroll center center rgba(0, 0, 0, 0); height: 550px; width: 100%; text-align: center;">
 <?PHP
} else {
  ?>
         <div style="background: url('images/newsletter.png') no-repeat scroll center center rgba(0, 0, 0, 0); height: 550px; width: 100%; text-align: center;">
  <?PHP
}
?>
<?PHP
if($deviceType=="phone"){
  ?>
          <div style="background: url('images/textbox.png') no-repeat scroll center center rgba(0, 0, 0, 0); width: 60%; left: 2em; top: 18em; position: relative; text-align: center;">
	    <input id="nombre" type="text" value="Acorta tu URL" placeholder="Acorta tu URL" onclick="limpiarNombre();" style="padding-left: 1em; font-size: 1.5em; height: 77px; width: 100%; background-color: transparent;">
	  </div>
	  <div style="cursor: pointer; width: 5em; text-align: center; left: 15em; top: 13em; position: relative;">
	    <input onclick="acortar();" style="border-radius: 30%; color: #FFFFFF; font-size: 1.5em; height: 60px; width: 3.2em; background-color: #0973b2;" type="button" value="Do It" />
	  </div>
          <div style="cursor: pointer; width: 5em; text-align: center; left: 4em; top: 20em; position: relative;">
	    <p style="font-size: 2em; color: #000000;">webos</p>
	  </div>
 <?PHP
} else {
  ?>
          <div style="background: url('images/textbox.png') no-repeat scroll center center rgba(0, 0, 0, 0); width: 41%; left: 27em; top: 20em; position: relative; text-align: center;">
	    <input id="nombre" type="text" value="Acorta tu URL" placeholder="Acorta tu URL" onclick="limpiarNombre();" style="padding-left: 1em; font-size: 1.5em; height: 77px; width: 100%; background-color: transparent;">
	  </div>
	  <div style="cursor: pointer; width: 5em; text-align: center; left: 65em; top: 15em; position: relative;">
	    <input onclick="acortar();" style="border-radius: 30%; color: #FFFFFF; font-size: 1.5em; height: 60px; width: 3.2em; background-color: #0973b2;" type="button" value="Do It" />
	  </div>
          <div id="link" style="width: 40em; text-align: center; left: 28em; top: 20em; position: relative;">
	    <p style="font-size: 2em; color: #000;">Visítanos en <a target="_blank" href="http://bamboostr.com">http://bamboostr.com</a> y obtén más ventas en redes sociales</p>
	  </div>
  <?PHP
}
?>
	  
	</div>
      </div>
    </div>
  </div>
</div>

<div style="text-align: center;" id="_datos" class="container_wapper">
  
  <div style="display: table;">
    <img style="width: 100%;" src="images/datos.png" />
  </div>
  
  <div style="width: 100%; display: table;">
    <div style="display: table-row">
      <div style="width: 30%; display: table-cell;">
        <a target="_blank" href="http://facebook.com/bamboostr">
          <img style="width: 30%;" src="images/dame-un-like.png" />
        </a>
        <a target="_blank" href="http://facebook.com/bamboostr">
          <img style="width: 15%;" src="images/facebook.png" />
        </a>
      </div>
      <div style="width: 40%; display: table-cell;">
        <a href="http://bamboostr.com">
          <img style="width: 100%;" src="images/bamboostr2.png" />
        </a>
      </div>
      <div style="width: 30%; display: table-cell;">
        <a target="_blank" href="http://twitter.com/bamboostr">
          <img style="width: 15%;" src="images/twitter.png" />
        </a>
        <a target="_blank" href="http://twitter.com/bamboostr">
          <img style="width: 25%;" src="images/sigueme.png" />
        </a>
      </div>
    </div>
  </div>
  <div id="cargando">
  </div>
  
</div>
<?PHP
include 'desktop/footer.php';
echo footer($footer_bottom); ?> 
<script src="js/jquery-ui.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.singlePageNav.min.js"></script> 
<script src="js/unslider.min.js"></script> 
<script src="js/_script.js"></script>
</body>
</html>