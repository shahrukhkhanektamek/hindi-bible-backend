<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th>S. No.</th>
                    <th>Device Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Date Activate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_list as $key=> $value)
                <tr>
                    <td></td>
                    <td>{{$value->device_id}}</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle"
                                    src="{{Helpers::image_check($value->image)}}" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                {{$value->name}}<br>
                                <b>{{sort_name.$value->user_id}}</b>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($value->is_paid==1)
                        <span class="badge bg-success">Active Package</span>
                        @endif
                        @if($value->is_paid==0)
                        <span class="badge bg-danger">Unactive Package</span>
                        @endif



                    </td>
                    <td>{{$value->email}}</td>
                    <td>{{date("D d F Y h:i A", strtotime($value->add_date_time))}}</td>
                    <td>
                        @if(!empty($value->activate_date_time))
                        {{date("D d F Y h:i A", strtotime($value->activate_date_time))}}
                        @endif
                    </td>
                    <td>                        
                            <!-- <a href="{{route('user.dashboard').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-primary mb-1">Dashboard</a> -->
                            <!-- <a href="{{route('user.team').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-success mb-1">All Team</a> -->
                            <!-- <a href="{{route('user.reffral').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-danger mb-1">Reffrals</a> -->
                            <!-- <a href="{{route('user.team-reffral').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-danger mb-1">Team Reffrals</a> -->
                            <a href="{{route('user.account-action').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-info mb-1 w-100">Account View</a>
                            <!-- <a href="{{$data['edit_btn_url'].'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-success edit-item-btn mb-1">Edit Basic Detail</a> -->
                            
                            <!-- <a href="{{route('user.change-password').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-warning mb-1">Change Password</a> -->
                            <!-- <a href="#" class="btn btn-sm btn-info mb-1">Upgrade</a> -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- end table -->
    </div>
</div>


<div class="card pagination" >
    {{$data_list->links()}}
</div>
