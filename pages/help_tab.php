
<?php
  if(isset($_POST['messageInput']) && isset($_POST['emailInput'])){
    if(sendMessage($_POST['emailInput'],$_POST['messageInput'])){
        echo "<script> $('#okModal').modal('show'); </script>";
    }else{
        echo "<script> $('#errorModal').modal('show'); </script> ";
    }
  }
?>

<h1> Let's Talk </h1>
<p> send us your critics, appreciations or isssue over here</p>

<form action="#" method="post">
  <div class="form-group">
    <label for="emailInput">Enter your email address</label>
    <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="messageInput">Enter your message</label>
    <textarea class="form-control" id="messageInput" name="messageInput" rows="4" required></textarea>
  </div>
  <div class="text-right">
    <button type="submit" class="btn btn-primary"> Send </button>
  </div>
</form>


<div class="modal fade" id="okModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Message sent
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Message sent
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
