@extends('menu/header')
@extends('menu/menu')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('screensectionadd.index') }}"> Back</a>
            </div>
        </div>
    </div>
<!--    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <form method="post" action="{{ route('screensectionadd.update', $screensection->id) }}">
               <div class="row">
               @csrf
               @method('PUT')

                  <div class="col-12">
                     <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                     <div class="row mb-3">
                        <div class="col-12 col-md-6">
                           <div class="row">
                              <!-- <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Main Screen</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="main_screen" id="main_screen" class="select2 form-control" required>
                                 <option value='' selected>Select the Main Screen</option><option value='5f6203173b9d035003'data-extra='far fa-user'>Admin</option><option value='5f6203979232d19864'data-extra='fe-settings noti-icon'>Settings</option>                                </select>
                              </div> -->
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Screen Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="screen_name" name="screen_name" class="form-control" value="demo" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Order No</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="number" id="order_no" name="order_no" class="form-control" value="demo" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Icon</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="icon" name="icon" class="form-control" value="" placeholder = "Material Design Icon" >
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="row">
                              
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Status</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="is_active" id="is_active" class="select2 form-control" required>
                                 <option value='1' selected = 'selected' >Active</option><option value='0'>In Active</option>                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Description</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <textarea name="description" id="description"  rows="5" class="form-control" value=""></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12" align="right">
                           <!-- Cancel,save and update Buttons -->
                           <a href="screen_section.php" class="btn btn-danger">Cancel</a>   
                          <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">Save</button>                        
                        </div>
                     </div>
                  </div>
               </div>
            </form>   
@endsection