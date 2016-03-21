<?php
for($i=1;$i<=(int)$_POST["hdnMaxLine"];$i++)
{
			echo $_POST["txtSiteCode_".$i];
}

?>