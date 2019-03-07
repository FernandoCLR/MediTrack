
    @extends('layouts.app')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
    @section('content')
    <div class="container box">
        <h3 >Meditrack Search</h3><br />
        <div class="panel panel-default">
         <div class="panel-heading">Search</div>
         <div class="panel-body">
          <div class="form-group">
           <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data *NIC Number Would Preferable" />
          </div>
          <div class="table-responsive">
           <h3>Total Record Count : <span id="total_records"></span></h3>
           <table class="table table-striped table-bordered " >
            <thead>
            
             <tr>
              <th>First Name</th>
              <th>Second Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>NIC</th>
              <th>Bood Group</th>
              <th>Mobile Number</th>
             </tr>
            
            </thead>
            <tbody>
     
            </tbody>
           </table>
          </div>
         </div>    
        </div>
       </div>



    @endsection

    <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('live_search.action') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
                    });
        
        });

        
        </script>
        