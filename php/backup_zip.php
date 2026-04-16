<?php
require_once 'conexao.php';

mysql_connect("localhost",$user,$pass) or die(header('location: ../html/home.php?informacao=Usuário ou senha inválidos'));
mysql_select_db($banco) or die(header('location: ../html/home.php?informacao=Não conectou ao banco'));
$back = fopen($banco.".sql","w");
$res = mysql_list_tables($banco) or die(header('location: index.php?informacao=3'));
while ($row = mysql_fetch_row($res)) {
   $table = $row[0]; 
   $res2 = mysql_query("SHOW CREATE TABLE $table");
   while ( $lin = mysql_fetch_row($res2)){ 
      fwrite($back,"\n#\n# Criação da Tabela : $table\n#\n\n");
      fwrite($back,"$lin[1] ;\n\n#\n# Dados a serem incluídos na tabela\n#\n\n");
      $res3 = mysql_query("SELECT * FROM $table");
      while($r=mysql_fetch_row($res3)){ 
         $sql="INSERT INTO $table VALUES (";
         for($j=0; $j<mysql_num_fields($res3);$j++)
            {
               if(!isset($r[$j]))
                  $sql .= " '',";
               elseif($r[$j] != "")
                     $sql .= " '".addslashes($r[$j])."',";
               else
                  $sql .= " '',";
            }
         $sql = ereg_replace(",$", "", $sql);
         $sql .= ");\n";
         fwrite($back,$sql);
      }
   }
}
fclose($back);
$arquivo = $banco.".sql";

$pasta = "C:/Users/Enoque/Downloads/$arquivo";

$copiar = copy($arquivo, $pasta);

?>
<script>
   window.location = document.referrer;
</script>
