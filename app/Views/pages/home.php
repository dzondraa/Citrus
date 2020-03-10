<div class="container">

  <!-- Page Heading -->
  <h1 class="my-4">Citrus
    <small>Store</small>
  </h1>

  <?php
    foreach($messages as $msg):
  ?>

  <div class="alert alert-<?= $msg->type ?>" role="alert">
  <?= $msg->message ?>
  </div>

  <?php endforeach ?>

  <div class="row">
    <?php foreach($products as $product){
        include "app/views/components/single-product.php";
    }
    ?>
    
  </div>
  <!-- /.row -->

  <!-- Pagination -->
  

</div>

<!-- COMMENTS -->

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>

        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
            </ul>            
            <div class="tab-content">
              
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">
                      <?php
                      foreach($comments as $comment) {
                        include "app/views/components/single-comment.php";
                      }
                        
                      ?>         
                      
                     
                    </ul> 
                </div>

                <!-- ADD COMMENT SECTION -->
                <div class="tab-pane" id="add-comment">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" id="commentForm" role="form"> 
                    <div class="form-group">
                            <label for="uploadMedia" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">                    
                                <div class="input-group">
                                  <input type="text" class="form-control" name="name" id="uploadMedia">
                                </div>
                            </div>
                        </div>
                     
                      <div class="form-group">
                            <label for="uploadMedia" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">                    
                                <div class="input-group">
                                  <input type="text" class="form-control" name="email" id="uploadMedia">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="text" id="addComment" rows="5"></textarea>
                            </div>
                        </div>
                  
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase" name="submit" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                            </div>
                        </div>            
                    </form>
                </div>
               </div>
            </div>
        </div>
	</div>
  </div>
<link rel="stylesheet" href="public/css/comments.css">