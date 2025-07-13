<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th scope="col">Name</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Sub Menu 1</th>
                    <th scope="col">Font Size</th>
                    <!-- <th scope="col">Font Color</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_list as $key=> $value)
                <tr>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle" src="{{Helpers::image_check($value->image)}}" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                @php($check = DB::table("sub_sub_sub_category")->where("sub_sub_category_id", @$value->id)->first())
                                @if(!empty($check))
                                    <a href="{{route('sub-sub-sub-category.list')}}?id={{Crypt::encryptString($value->id)}}">{{$value->name}}</a>
                                @else
                                    <a href="{{route('post.add')}}?sub-sub-category-id={{Crypt::encryptString($value->id)}}">{{$value->name}}</a>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->sub_category_name}}</td>
                    <td>{{$value->font_size.'px'}}</td>
                    <!-- <td>
                        <span style="background-color: {{$value->font_color}};width: 30px;height: 30px;display: block;border-radius: 50%;"></span>                        
                    </td> -->
                    <td>{!!Helpers::active_inactive($value->status)!!}</td>
                    <td>
                        <div class="d-flex gap-2">

                            <div class="edit">
                                <a href="{{$data['edit_btn_url'].'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-success edit-item-btn">Edit</a>
                            </div>
                            <div class="remove">
                                <a href="{{$data['delete_btn_url'].'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-danger remove-item-btn">Delete</a>
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
