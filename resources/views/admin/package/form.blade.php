@php($gst = json_decode(DB::table('setting')->where('name','gst')->first()->data)->gst)

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>{{$data['page_title']}} | {{env("APP_NAME")}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start Include Css -->
    @include('admin.headers.maincss')
    <!-- End Include Css -->
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Start Include Header -->
        @include('admin.headers.header')
        <!-- End Include Header -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">{{$data['page_title']}}</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active">{{$data['page_title']}}
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="{{$data['submit_url']}}" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        @csrf
                        <input type="hidden" name="id" value="{{Crypt::encryptString(@$row->id)}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">
                                                                                        
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Cost</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="cost" id="cost" value="{{@$row->cost}}" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">GST ({{$gst}}%)</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="gst" value="{{@$row->gst}}" id="gst" required readonly>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Payable Price</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="payable_price" id="payable_price" value="{{@$row->payable_price}}" required readonly>
                                            </div
>
                                            

                                            
                                           
                                            <div class="col-lg-4 hide">
                                                <label for="formFile" class="form-label">Action</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="status">
                                                    <option value="1" @if(!empty(@$row) && @$row->status==1)selected @endif >Active</option>
                                                    <option value="0" @if(!empty(@$row) && @$row->status==0)selected @endif >Inactive</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <!-- end card -->
                                        <div class="text-center mt-5 mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Page-content -->
            <!-- Start Include Footer -->
            @include('admin.headers.footer')
            <!-- End Include Footer -->
        </div>
    </div>
    <!-- END layout-wrapper -->
    <!-- Start Include Script -->
    @include('admin.headers.mainjs')
    <!-- End Include Script -->

<script>
    $(document).on("keyup", "#cost, #gst, #payable_price",(function(e) {
      calculateGst();
    }));

    function calculateGst() {
        var cost = parseFloat($("#cost").val());
        var gst = parseFloat($("#gst").val());
        var payable_price = parseFloat($("#payable_price").val());
        $("#gst").val(cost*{{$gst}}/100);
        $("#payable_price").val((cost*{{$gst}}/100)+cost);
    }
</script>


</body>
</html>