@extends('admin/layout')

@section('content')

<div style="min-height: 657px;" id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
    <?php include 'topbar.php';?>
    </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Add Slider Image</h2>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <?php
if($insert)
{
?>
                        <div class="alert alert-info alert-dismissable col-md-3" style="float:none;padding: 7px;">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            New Slider Image Added.
                        </div>
<?php } ?>
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="type" required>
                                        <option value="">Select location</option>
                                        <?php
                                            $query2="SELECT * FROM `packages` order by location asc";
                                            $get_query2 = mysqli_query($connection,$query2);
                                            while($type=mysqli_fetch_array($get_query2))
                                            {
                                        ?>
                                        <option value="<?php echo $type['id'];?>"><?php echo $type['location'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label">Image size 1920 X 860</label>
                                <div class="col-sm-4">
                                    <input name="image" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        
                            <div class="form-group"><label class="col-sm-2 control-label">Is Active</label>
                                <div class="col-sm-10"><label class="checkbox-inline"><input name="is_active" value="1" id="inlineCheckbox1" style="margin-top:-2px;" type="checkbox"></label>
                            </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" name="btn_add_slider" type="submit" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    </div>
    </div>

@endsection('content')