<html>
<head>

</head>

<body>

<?php

require_once('../model/database.php');
require_once('../model/admin.php');
require_once('../model/admin_db.php');

$admins = AdminDB::getAdmins();

foreach($admins as $admin) {
    echo $admin->getIdadmin(). ' ' . $admin->getName() . ' ' . $admin->getPassword();
}

?>

</body>

</html>