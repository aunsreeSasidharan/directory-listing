@include('header')
<div class="container">
<div class="main-table">
        <div class="table-header">
            <div class="content">
            <span class="link"><a href="/directory-listing">Back</a></span> 
            <span class="center"> HISTORY LISTING</span>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
            <table class="table data-table stripe hover" id="table">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Action</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                   
              </tbody>
            </table>
            </div>
            </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            ajax: {
                url:"{{ route('history.index') }}"
        
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'action', name: 'action'},
                {data: 'date', name: 'date'},
            ],
            "search": {
                "regex": true
            },
            "pageLength": 13,
            "bLengthChange": false,
            "language": {
                            "paginate": {
                                // "next" :"<img src='{{URL('assets/icon/arrow_next.svg')}}' width='10' height='10'>",
                                // "previous" : "<img src='{{URL('assets/icon/arrow_previous.svg')}}' width='10' height='10'>"
                            }
                        },
            "bFilter": true,
          //  "scrollX": true,
            "info": false,
            dom: 'Bfrtip',
            buttons: [
            ],
            "deferRender": true,
            initComplete: function(settings, json) {
                
            },
            "createdRow": function( row, data, dataIndex ) {
               
            },
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
                },
        });


    });
    
</script>
@include('footer')