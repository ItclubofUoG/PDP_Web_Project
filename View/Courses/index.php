
<h3>Manage Course</h3>
<hr>

<form action="../../Controller/courseController.php" method="POST">
    <div class = "form-row">
        <div class="form-group col-md-7">
          <label for="inputName">Name</label>
          <input type="text" name="inputName" class="form-control" placeholder="Name">
        </div>
    </div>

    <div class ="form-row">
      <div class ="form-group col-md-12">
        <input type ="submit" class ="btn btn-success" name ="btn_add_course" value ="Add Course">
        <input type ="submit" class ="btn btn-primary" name ="btn_edit_course" value ="Edit">
        <input type ="submit" class ="btn btn-primary" name ="btn_delete_course" value ="Delete">
    </div>
</form>

