<li class="media">
    <a class="pull-left" href="#">
        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
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