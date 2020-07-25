@include('header')
<div class="container">
    <div class="main-table">
        <div class="table-header">
        <div class="content">
            
            <div class="col-md-2">File Upload</div>
            <div class="col-md-8">
            <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
                <div class="col-md-4">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
				<input type="file" name="file" id="file">
				@if ($errors->has('file'))
	            	<span class="help-block">
	                	<strong>{{ $errors->first('file') }}</strong>
	            	</span>
	        	@endif
                </div>
                <div class="col-md-3"><input type="submit" value="Upload" name="submit"></div>
            <!-- <label>Select file to upload:</label> -->

				
			</form>
            </div>
			
        </div>
        <div class="right-div"><span class="link"><a href="/history-listing">View History</a></span></div>
        </div>
        <div class="page-content">
            <div class="container">
            <table class="table data-table stripe hover" id="table">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>File Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                   </tr>
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
                url:"{{ route('listing.index') }}"
        
            },
            columns: [
                {data: 'sl_no', name: 'sl_no'},
                {data: 'filename', name: 'filename'},
                {data: 'action', name: 'action' ,sortable : false},
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