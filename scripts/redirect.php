<?PHP
include 'conexioni.php';
$url = $_GET["id"];
if(strlen($url)==6){
  $query = $conn->query("SELECT id,url FROM acortador WHERE shrink COLLATE utf8_bin='".$url."'");
  if($query->num_rows>0){
    $row=$query->fetch_assoc();
    $query2 = $conn->query("UPDATE acortador SET visitas=visitas+1 WHERE id='".$row["id"]."'");
    $query2 = $conn->query("INSERT INTO acortador_info (id_acortador,url,idioma,SO) VALUES ('".$row["id"]."','".$_SERVER['HTTP_REFERER'] ."','".substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2)."','".$_SERVER[HTTP_USER_AGENT]."')");
    header("Location: ".$row['url']."");
  }
}
?>