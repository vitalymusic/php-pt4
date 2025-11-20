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
            <div class="new_comment">
                <button class="show_comment_form_btn">Pievienot komentāru</button>
                <form action="" class="add_comment_form" >
                    <input type="hidden" name="post_id" value="<?=$post["id"]?>">
                    <input type="text" name="user" id="comment_user" placeholder="Jūsu vārds">
                    <input type="text" name="comment" id="comment_text" placeholder="Komentārs">
                    <input type="submit" value="Pievienot">
                </form>
            </div>
            <p><?=$post["create_date"]?></p>

           

        </div>
    <?php endforeach;?>    

</div>

<?php  ?>