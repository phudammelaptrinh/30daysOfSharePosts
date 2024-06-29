<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

<div class="card card-body bg-light mt-5">
  <h2>Edit Post</h2>
  <p>Edit your post with this form</p>
  <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
    <div class="form-group mb-3">
      <label for="title">Title: <sup>*</sup></label>
      <input type="text" name="title"
        class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['title']; ?>">
      <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
    </div>
    <div class="form-group mb-4">
      <label for="body">Body: <sup>*</sup></label>
      <textarea name="body"
        class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
      <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
    </div>
    <div class="d-flex justify-content-between">
      <input type="submit" value="Submit" class="btn btn-success">
      <a href="<?php echo URLROOT; ?>/posts" class="btn btn-secondary ml-2">Cancel</a>
    </div>
  </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>