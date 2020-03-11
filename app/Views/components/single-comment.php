<li class="media">
    <a class="pull-left" href="#">
        <img class="media-object img-circle" src="public/images/user.png" alt="profile">
    </a>
    <div class="media-body">
        <div class="well well-lg">
            <h4 class="media-heading text-uppercase reviews"><?= $comment->name ?> </h4>
            <h5 class="media-heading reviews"><?= $comment->email ?> </h5>
            <p class="media-comment">
            <?= $comment->text ?>
            </p>
        </div>              
    </div>

</li> 