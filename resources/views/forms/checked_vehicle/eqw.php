<html>
<style>
    .form-p p {
        font-size: 14px;
        color: #555;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .header-elements-inline {
        display: unset !important;
    }

    .ul-widget__item {

        padding: 4px;
    }

    h3.ul-widget__head-title {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        color: #003473;
    }
</style>

@extends('menu/header')
@extends('menu/menu')


<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">

        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Intercepted Form</h1>
                    <ul>
                        <li><a href="#">Form</a></li>
                        <li>Place of Interception Form</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <a href="../checked_vehicle">
                        <button class="btn btn-info m-1" type="button"> <i class="i-Arrow-Back-2"></i> Back</button></a>
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-3">
            <div class="card-body" style="background: #eee;">
                <!-- <form class="was-validated" method="get" action="{{ route('vehicleSearch.index') }}" autocomplete="off">
                    @csrf -->
                    <div class="row row-xs">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <input class="form-control" name="veh_number" id="veh_number" type="text" placeholder="Enter a Vehicle Number" oninput="this.value = this.value.toUpperCase()">
                        </div>

                        <div class="col-md-2 mt-3 mt-md-0">
                            <button type="submit" id="vehicle_search"class="btn btn-primary btn-block">Go</button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                <!-- </form> -->
            </div>
        </div>

        <div class="row">
        <!-- @yield('content') -->
        @include('checked_vehicle.main_data')
            
        </div>
            </div>
        </div>

    </div>
</div>
<!-- end of main-content -->
</div>
</div>

@extends('menu/footer')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    let i = 0;
    $('#vehicle_search').on('click',function(){
    //     for (let i = 0; i <= 100000; i++) {
        
    //     d = i+1;
    //     console.log(d);
    //   }
      $('#accordionRightIcon').hide();
        $("#vehicle_no").empty(); //set the attribute and content here for an example div
       $("#veh_place").empty();
       $("#veh_owner").empty();
       $("#poi_number").empty();
        $.ajax({
        type : 'get',
        url : '{{ route("vehicleSearch.index") }}',
        data:{             
                'veh_number': $('#veh_number').val()
        },
        
        success:function(data){
            // alert(data);
            // for (let i = 0; i <= 100000; i++) {
            //     d = ++i;
            // } 
            if (data && data.length > 0) {  
      data=$.parseJSON( data ); //parse response string
    
      
      vehicle_no=data.veh_data.vehicle_no;//value of b
      veh_place=data.veh_data.veh_place;
      veh_owner =data.veh_data.veh_owner;//value of content1


      i = i+1;
      poi_number = data.veh_data.num+i;
      
      
    //     foreach(data.eway_data as datas){
    //         console.log(datas);
    //     alert(datas);
    //   }
    //   $('#eway_data_list').append(dataaa);


    //   eway_detail = data.eway_data[0];
    //   alert(eway_detail);

    //   foreach(dataaaas datas){
    //     alert(datas);
    //   }

    //   let i=0;
    // let counter = 0
    //   setInterval(() => {
    //      counter = counter + 1
    //      poi_number.innerHTML = 'Counter value: ' + counter
    // //   } 
    // //   1000);
    // //   poi_number =data.num+counter;
    //   console.log(counter);
    //    i=0;
    //    for (let i = 0; i <= 100000; i++) {
           
    //         ++ i;
    //         // $arr = array($demo);
            
    //         } 
    //         const date = new Date('ym');
    //           demo = "PO"+"CHN1"+date+++i;
    
    //   flag += 10;
      
       $("#vehicle_no").append(vehicle_no); //set the attribute and content here for an example div
       $("#veh_place").append(veh_place);
       $("#veh_owner").append(veh_owner);
       $("#poi_number").append(poi_number);


    //    $("#accordionRightIcon").empty();
    //             $.each(data.eway_data,function(index,value){
    //                 $("#accordionRightIcon").append(''+value+'<br/>');
    //             });
    //         }

    }
           
            

            // alert(data["likes"]);
           
        //    $.each(data.vehicle_data, function(i, vehicle_data){
        //         console.log(vehicle_data.vehicle_no)
        //    })
          

        
        // }
        });
        })

        
    </script>

</html>