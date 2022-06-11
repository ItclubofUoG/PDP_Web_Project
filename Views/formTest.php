<!-- // Input Data  --> 
<div>
    <form  action="../Controller/membersController.php"  method="POST">
        <div class = "form-row">
            <div class="form-group col-md-7">
            <label for="inputName">Month Begin</label>
            <input type="text" name="month_begin" class="form-control" placeholder="monthbegin">
            </div>
            <div class="form-group col-md-7">
            <label for="inputName">Month End</label>
            <input type="text" name="month_end" class="form-control" placeholder="monthend">
            </div>
            <div class="form-group col-md-7">
            <label for="inputName">Major</label>
            <input type="text" name="major" class="form-control" placeholder="major">
            </div>
            <div class="form-group col-md-7">
            <label for="inputName">Course</label>
            <input type="text" name="course" class="form-control" placeholder="course">
            </div>
        </div>
        <div class ="form-row">
        <div class ="form-group col-md-12">
            <input type ="submit" class ="btn btn-success" name ="btn_fillter" value ="Fillter ">
            <input type ="submit" class ="btn btn-success" name ="btn_ToExel" value ="To Exel ">
        </div>

    </form>
</div>
<div>
    <form  action="../Controller/membersController.php"  method="POST">
        <div class = "form-row">
            <div class="form-group col-md-7">
            <label for="inputName">Month</label>
            <input type="date" name="date" class="form-control" placeholder="Month">
            </div>
            
        </div>
        <div class ="form-row">
        <div class ="form-group col-md-12">
            <input type ="submit" class ="btn btn-success" name ="btn_search" value ="Search">
            
        </div>

    </form>
</div>