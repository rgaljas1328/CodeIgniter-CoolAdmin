<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="layout-content">
        <!-- Modal -->
        <div id="edit_salaries_modal" tabindex="-1" role="dialog" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method='post' id='form_edit_salary'>
                        <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Salary</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type='hidden' name='salaries_modal_id' id='salaries_modal_id'>
                                            <label for="salaries_modal_position">Position</label>
                                            <input type="text" class="form-control input-thin pill" name="salaries_modal_position" id="salaries_modal_position" placeholder="Position" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="salaries_modal_amount">Amount</label>
                                            <input type="text" class="form-control input-thin pill" name="salaries_modal_amount" id="salaries_modal_amount" placeholder="Position" required="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn pull-left btn-pill" data-dismiss="modal"><i class='fa fa-close'></i> Close</button>
                            <button type="submit" class="btn btn-success btn-pill"><i class='fa fa-check'></i> Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.Modal -->
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
                <span class=" icon icon-wpforms"></span>
                <span class="d-ib">Salaries</span>
            </h1>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="reset" class="card-action card-reload" title="Reload"></button>
                  </div>
                  <strong>New Salaries</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-form-wrapper">
                                <form data-toggle="validator" id='create_salary'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input type='text' id='position'  class="form-control input-thin pill" name='position'  placeholder="Position" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type='text' id='amount'  class="form-control input-thin pill" name='amount'  placeholder="Amount" class="form-control">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="form-group pull-right">
                                        <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-pill">
                                            <span class="icon icon-download icon-xs icon-fw"></span>
                                            Save
                                        </button>
                                        <button type="reset" class="btn btn-pill">
                                            <span class="icon icon-refresh icon-xs icon-fw"></span>
                                            Clear
                                        </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                   
                  </div>
                  <strong>List of Salaries</strong>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped dataTable" id='salariesTable'>
                                        <thead>
                                            <tr>
                                                <th>Position</th>
                                                <th>Created</th>
                                                <th>Modified</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='salaries_table'>
                                            
                                        </tbody>
                                    </table>
                </div>
            </div>
          </div>
          
        </div>
      </div>
      <script>

$(function(){

    getSalaries();

    function getSalaries()
    {
        $('#salariesTable').DataTable().clear();
        $('#salariesTable').DataTable().destroy();
        let request = $.ajax({
            
            url: '<?=base_url('admin/salaries/getSalaries')?>',
            dataType: 'json',
            type: 'GET'                
        });
        request.done(function(data){
            $.each(data, function(index, element){
                    $('#salaries_table').append("<tr><td>"+element.salary_type+"</td>"+
                    "<td>"+element.created+"</td>"+
                    "<td>"+element.modified+"</td>"+
                    "<td>"+element.salary_amount+"</td>"+
                    "<td><button id='edit_"+element.id+"' class='btn btn-warning btn-xs btn-pill'><i class='fa fa-edit'></i> Edit</button>"+"  "+
                    "<a href='#' class='btn btn-xs btn-outline-danger btn-pill' id='delete_"+element.id+"' data-placement='top' title='Delete group?' data-singleton='true' ><i class='fa fa-trash'></i> Delete</a>"+
                    "</td></tr>");
                });
                $('#salariesTable').DataTable();
        });
    }

    $('#create_salary').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url('admin/salaries/create')?>',
            data: $(this).serialize(),
            type: 'post',
            dataType: 'json',
            success: function(data){
                getSalaries();
                toastr.success(data.status_description);
            }
        });
    });

    $(document).on('mouseover', 'a[id^="delete_"]', function(e){
        e.preventDefault();
        let id = ($(this)[0].id).split('_')[1];
        $('#'+$(this)[0].id+'').confirmation({
            onConfirm: function(){
                $.ajax({
                    url: '<?=base_url('admin/salaries/delete')?>',
                    data: {'id' : id},
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        getSalaries();
                        toastr.success(data.status_description);
                    }
                });
            },
            onCancel: function(){}
        });
    });

    $(document).on('click', 'button[id^="edit_"]', function(){
        var id = ($(this)[0].id).split('_')[1];
        $.ajax({
            url: '<?=base_url('admin/salaries/getSalary')?>',
            data: { 'id':id },
            method: 'get',
            dataType: 'json',
            success: function(data){
                // $('#form_edit_group')[0].reset();
                $('#salaries_modal_id').val(id);
                $('#salaries_modal_position').val(data.salary_type);
                $('#salaries_modal_amount').val(data.salary_amount);
                $('#edit_salaries_modal').modal('show');
            }
        });
    });

    $(document).on('submit', '#form_edit_salary', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url('admin/salaries/edit')?>',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#edit_salaries_modal').modal('hide');
                $('#form_edit_salary')[0].reset();
                getSalaries();
                toastr.success(data.status_description);
            }
        });
    });
});      

</script>