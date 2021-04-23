<div id="post">
    <div>
        <img src="climbing photo.jpg" style="width: 75px;margin-right: 4px;">
    </div>
    <div>
        <div style="font-weight: bold;">
        <?php  
        if(isset($row_username['username'])){
            echo $row_username["username"];
        }?>
        </div>
        <?php 
        echo $row["post"];
        ?>
    <br/><br/>

    <a href="">Like</a> <a href="">Comment</a> <span>March 19, 2021</span>

    </div>
</div>