<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>Origin Of Budget</label></td>
                        <td>
                            <div class="input-group">
                                <select class="form-control select2bs4" style="width: 100%;border-radius:0;">
                                    <option selected="selected">Project</option>
                                    <option>Overhead</option>
                                    <option>Sales</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Project Code</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="projectcode" style="border-radius:0;" name="projek_code" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="projectname" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Site Code</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="subprojectc" style="border-radius:0;" name="sub_projek_code" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="subprojectn" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group input_fields_wrap">
                <div class="input-group control-group" style="width:100%;">
                    <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;">
                    <div class="input-group-btn">
                        <!-- <button class="btn btn-outline-success btn-sm fileInputMultiArf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button> -->
                        <a class="btn btn-outline btn-success btn-sm add_field_button" style="color: white;">Add</a>
                    </div>
                </div>
            </div>
            <br>
            <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                <i class="fa fa-times" aria-hidden="true">Cancel</i>
            </button>
            <button type="submit" class="btn btn-outline-success btn-sm float-right" title="Submit" style="margin-right:5px;" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">
                <i class="fas fa-plus" aria-hidden="true">Submit</i>
            </button>
        </div>
    </div>
</div>
