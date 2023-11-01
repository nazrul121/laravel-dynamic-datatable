@extends('welcome')

@section('main_content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data table</h4>
        <div class="row">
            <div class="col-12">
                <div class="responsive-table">
                    <table class="table " id="products-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- for datatable -->
    <script src="{{asset('back/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('back/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- <script src="{{asset('back/js/data-table.js')}}"></script> -->
    <link rel="stylesheet" href="{{asset('back/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

    <script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function () {
      
        $(function () { table.ajax.reload(); });

        let table = $('#products-table').DataTable({
            processing: true, serverSide: true,
            "language": { processing: '<img src="https://i.pinimg.com/originals/b7/aa/f9/b7aaf94d7c34c81d57bf028e9d58377c.gif">'},
            ajax: '{!! route("datatable") !!}',
            order: [ [0, 'desc'] ],
            "lengthMenu": [[10, 50, 200,400,600,800,1000,5000], [10, 50, 200,400,600,800,1000,5000]],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'phone', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
        
        $('.careerTable').on('click', '.applicants', function(){
            var id = $(this).attr('id');
            $('#applicantModal').modal('show');
            // window.open(url+'/common/career/applicants/'+id);
            $.get(url+'/datatable', function(data){
                $('.applicant_info').html(data);
            })
        });

        $('.addModal').on('click', function(){
            $('#addModal').modal('show'); $('#addForm').trigger("reset");
            $('.add_result').html('');
        })

        $("#addForm").submit(function(event) {
            event.preventDefault();
            $("[type='submit']").html(' Loading...');$('.add_result').html('');
            $("[type='submit']").prop('disabled',true);
            var form = $(this);var url = form.attr('action');
            var html = '';
            $.ajax({
                url:url, method:"post", data: new FormData(this),
                contentType: false,cache:false, processData: false,
                dataType:"json",
                success:function(data){
                    if(data.errors) {
                        html = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong class="text-danger">Warning! <br/> </strong>';
                        for(var count = 0; count < data.errors.length; count++)
                        { html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>' + data.errors[count] + '</p>';break;}
                        html += '</div>';
                    }
                    if(data.success){
                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong class="text-info">Success! </strong> ' + data.success +'</div>';
                        $('.careerTable').DataTable().ajax.reload();
                        setTimeout(function() { $('#addModal').modal('hide');}, 1000);
                    }
                    $("[type='submit']").text('Save Data');
                    $("[type='submit']").prop('disabled',false);
                    $('.add_result').html(html);
                }
            });
        });


        $('.careerTable').on('click', '.delete' ,function(e){
            if(confirm('Are you sure to remove the record permanently?? --- There is no Undo option')){
                let id = $(this).attr('id')
                $.ajax({
                    url: url+"/common/career/delete/"+id+"",
                    dataType:"json",
                    success:function(data){
                        if(data.error) alert(data.error);
                        if(data.success) $('.careerTable').DataTable().ajax.reload();
                    }
                });
            }
        });

    });

</script>
@endpush

