<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) 
{
    $query ="SELECT data FROM searchdata WHERE data like '" . $_POST["keyword"] . "%'  LIMIT 6;";
    $result = $db_handle->runQuery($query);
    if(!empty($result)) 
    {
        ?>
        <ul  style="list-style: none; padding: 0;" id="list">
        <?php
        foreach($result as $name) 
        {
            if(stripos($name["data"], $_POST["keyword"]) !== false)
            {
                ?>
                <li onClick="selectName('<?php echo $name["data"]; ?>');"><?php echo $name["data"]; ?></li>
                <?php
            }
            ?>
            <?php 
        } ?>
        </ul>
        <?php 
    } 
} ?>
