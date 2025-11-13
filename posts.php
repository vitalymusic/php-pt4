<?php require_once("./functions.php") ?>
<?php $posts = get_all_posts();?>


<div class="posts">
    <h2>Raksti</h2>
    <?php foreach($posts as $post): ?>
        <div class="post">
            <h3><?=$post["post_name"]?></h3>
            <div><?=$post["post_content"]?></div>
            <!-- <button >Parādīt komentārus</button> -->
            <div class="comments" data-postid="<?=$post["id"]?>">
                  
            </div>
            <p><?=$post["create_date"]?></p>

           

        </div>
    <?php endforeach;?>    

</div>

<?php  ?>