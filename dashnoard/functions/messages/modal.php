<!-- Button trigger modal -->
<button type="button" class="btn btn-primary _view" ms-id="<?php echo $value['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id'] ?>">
    View Message
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $value['messages'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>