<div class="container">
<table class="table table-dark" style="margin-top:100px;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Text</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

<?php
    foreach($comments as $comment):
        
?>
    <tr>
      <th scope="row"><?= $comment->id ?></th>
      <td><?= $comment->name ?></td>
      <td><?= $comment->email ?></td>
      <td><?= $comment->text ?></td>
      <td><?= $comment->approved ?></td>
      <td>
        <a href="index.php?page=admin&action=approve&id=<?=$comment->id?>" type="button" class="btn btn-success">Approve</a>
        <a href="index.php?page=admin&action=delete&id=<?=$comment->id?>" type="button" class="btn btn-danger">Delete</a>
      </td>
    </tr>
<?php endforeach; ?>

    </tbody>
</table>
</div>