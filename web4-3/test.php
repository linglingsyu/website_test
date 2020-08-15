<?php
echo "insert into `admin` (`acc`,`pw`,`pr`) values ('root','1234','".serialize([1,2,3])."')";
?>