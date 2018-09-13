<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="layout-content">
        <!-- Modal -->
        <!-- <div id="edit_groups_modal" tabindex="-1" role="dialog" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content">
                <form method='post' id='form_edit_group'>
                    <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Edit Group</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type='hidden' name='groups_modal_id' id='groups_modal_id'>
                                        <label for="groups_modal_name">Name</label>
                                        <input type="text" class="form-control input-thin pill" name="groups_modal_name" id="groups_modal_name" placeholder="Group Name" required="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="groups_modal_description">Description</label>
                                        <input type="text" class="form-control input-thin pill" name="groups_modal_description" id="groups_modal_description" placeholder="Description" required="" class="form-control">
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
        </div> -->

        <!-- /.Modal -->
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
                <span class=" icon icon-wpforms"></span>
                <span class="d-ib">Time Salaries</span>
            </h1>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-7">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                   
                  </div>
                  <strong>List of Time Salaries</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-nowrap dataTable" id='logTimeTable'>
                        <thead>
                            <tr>
                                <th>Created</th>
                                <th>Modified</th>
                                <th>Total_hours</th>
                                <th>logID_id</th>
                                <th>salaryID_id</th>
                            </tr>
                        </thead>
                        <tbody id='logTimes_table'>
                            
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          
        </div>
      </div>
<script>
$(function(){

    getLogTimes();

    function getLogTimes()
    {
        $('#logTimeTable').DataTable().clear();
        $('#logTimeTable').DataTable().destroy();
        let request = $.ajax({
            
            url: '<?=base_url('admin/log_time/getLogTimes')?>',
            method: 'get',
            dataType: 'json'
        });
        request.done(function(data){
            $.each(data, function(index, element){
                    $('#logTimes_table').append("<tr><td>"+element.user_id+"</td><td>"+element.log_in+"</td><td>"+element.log_out+"</td>");
                });
                $('#logTimeTable').DataTable();
        });
    }

    // $('#create_group').on('submit', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: '<?=base_url('admin/groups/create')?>',
    //         data: $(this).serialize(),
    //         method: 'post',
    //         dataType: 'json',
    //         success: function(data){
    //             getGroups();
    //             toastr.success(data.status_description);
    //         }
    //     });
    // });

    // $(document).on('mouseover', 'a[id^="delete_"]', function(e){
    //     e.preventDefault();
    //     let id = ($(this)[0].id).split('_')[1];
    //     $('#'+$(this)[0].id+'').confirmation({
    //         onConfirm: function(){
    //             $.ajax({
    //                 url: '<?=base_url('admin/groups/delete')?>',
    //                 data: {'id' : id},
    //                 method: 'get',
    //                 dataType: 'json',
    //                 success: function(data){
    //                     getGroups();
    //                     toastr.success(data.status_description);
    //                 }
    //             });
    //         },
    //         onCancel: function(){}
    //     });
    // });
    
    // $(document).on('click', 'button[id^="edit_"]', function(){
    //     var id = ($(this)[0].id).split('_')[1];
    //     $.ajax({
    //         url: '<?=base_url('admin/groups/getGroup')?>',
    //         data: { 'id':id },
    //         method: 'get',
    //         dataType: 'json',
    //         success: function(data){
    //             // $('#form_edit_group')[0].reset();
    //             $('#groups_modal_id').val(id);
    //             $('#groups_modal_name').val(data.name);
    //             $('#groups_modal_description').val(data.description);
    //             $('#edit_groups_modal').modal('show');
    //         }
    //     });
    // });

    // $(document).on('submit', '#form_edit_group', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: '<?=base_url('admin/groups/edit')?>',
    //         data: $(this).serialize(),
    //         method: 'post',
    //         dataType: 'json',
    //         success: function(data){
    //             $('#edit_groups_modal').modal('hide');
    //             $('#form_edit_group')[0].reset();
    //             getGroups();
    //             toastr.success(data.status_description);
    //         }
    //     });
    // });
});
</script>