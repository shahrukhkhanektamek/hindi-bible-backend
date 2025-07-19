<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Transection ID.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Payment Detail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_list as $key=> $value)
                <tr>
                    <td>
                        {{$value->transaction_id}}<br>
                    </td>
                    <td>
                        {{$value->user_name}}<br>
                        <b>{{sort_name.$value->uid}}</b>
                    </td>
                    <td>{{$value->user_email}}</td>
                    <td>{{$value->user_phone}}</td>
                    <td>

                        <span style="display: block;margin-bottom: 10px;"><b>Country:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;">{{$value->payment_type_text}}</div></span>
                        <span style="display: block;margin-bottom: 10px;"><b>Item Type:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;">{{$value->p_type_text}}</div></span>
                        <span style="display: block;margin-bottom: 10px;"><b>Payment Type:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;">{{$value->payment_by}}</div></span>
                            
                       

                        <span style="display: block;margin-bottom: 10px;"><b>Create Date Time: </b>{{date("Y M, d",strtotime($value->add_date_time))}} - {{date("h:i A",strtotime($value->add_date_time))}}</span>
                        <span style="display: block;margin-bottom: 10px;"><b>Payment Date Time: </b>
                            @if(!empty($value->payment_date_time))
                                {{date("Y M, d",strtotime($value->payment_date_time))}} - {{date("h:i A",strtotime($value->payment_date_time))}}
                            @endif
                        </span>
                    </td>
                    <td>{!!Helpers::status_get($value->status,'invoice')!!}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <div class="edit">
                                <a href="{{$data['view_btn_url'].'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-info edit-item-btn">Invoice</a>
                            </div>
                        </div>
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
