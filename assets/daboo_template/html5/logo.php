
<!-- saved from url=(0043)http://www.blobsallad.se/iframedsallad.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script type="text/javascript">
function log(msg)
{
  var textArea;

  textArea = document.getElementById("logArea");
  textArea.value = msg + "\n" + textArea.value;
}

function clearLog()
{
  var textArea;

  textArea = document.getElementById("logArea");
  textArea.value = "";
}

</script>

<script type="text/javascript" src="blobsallad/blobsallad.js">
</script>

<style type="text/css">
  canvas { }
</style>
</head>
<body onload="init('<?=isset($_GET['body'])?$_GET['body']:''?>', <?=isset($_GET['count'])?$_GET['count']:2?>, <?=isset($_GET['max'])?$_GET['max']:1?><?=isset($_GET['w'])?', '.$_GET['w']:''?> <?=isset($_GET['h'])?', '.$_GET['h']:''?>);" style="margin: 0">
<canvas id="blob" width="<?=isset($_GET['w'])?$_GET['w']:165?>" height="<?=isset($_GET['h'])?$_GET['h']:60?>"></canvas>
</body></html>