<?php
echo password_hash('mohamed', PASSWORD_DEFAULT, ['cost' => 12]) . "\n";
var_dump(password_verify('mohamed', '$2y$12$Ze7soCnfoOwBt/x4OXAlOupmRmndUx1V6uwsMR6Bu4mswDWWBlqe'));
?>