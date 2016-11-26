<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title;?></title>
</head>
<body>
<h1><?php echo $heading; ?></h1>
<h2>My todo list</h2>
<ul>
    <?php
    foreach ($todo_list as $item) {
        echo "<li>" . $item . "</li>";
    }
    ?>
</ul>
<?php
foreach ($user as $row)
{
    foreach ($row as $title => $value)
    {
        echo "$title ===> $value<br>";
    }
}
echo "=========================<br />";
echo "sunday: ".date('Y-m-d H:i:s',strtotime('sunday this week'))."<br />";
echo "monday: ".date('Y-m-d H:i:s',strtotime('monday this week'))."<br />";
echo "tuesday: ".date('Y-m-d H:i:s',strtotime('tuesday this week'))."<br />";
echo "today: ".strtotime('today')."<br />";
echo "now: ".time()."<br />";
$date = $date('Y-m-d');

?>

</body>
</html>
