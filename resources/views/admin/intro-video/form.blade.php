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

                                            <div class="col-lg-6">
                                                <label for="formFile" class="form-label ">Type</label>
                                                <select class="form-select mb-3 type" aria-label="Default select example" name="type">
                                                    <option value="1" @if(!empty(@$row) && @$row->type==1)selected @endif >Upload</option>
                                                    <option value="2" @if(!empty(@$row) && @$row->type==2)selected @endif >Vimeo</option>
                                                    <option value="3" @if(!empty(@$row) && @$row->type==3)selected @endif >Youtube</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label" for="product-title-input">Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{@$row->name}}" required>
                                            </div>


                                            <div class="col-lg-6">
                                                <label for="formFile" class="form-label d-block">Thumbnail Image</label>
                                                <label class="d-block">
                                                    <input class="form-control upload-single-image" type="file" name="image" accept="image/*" data-target="image">
                                                    <img class="upload-img-view img-thumbnail mt-2 mb-2 image" id="viewer" 
                                                        src="{{Helpers::image_check(@$row->image)}}" alt="banner image"/>
                                                </label>
                                            </div>

                                            <div class="col-lg-6 typelink" style="display: none;">
                                                <label class="form-label" for="product-title-input">Video Link/Iframe</label>
                                                <textarea class="form-control" rows="1" name="video" placeholder="Video Link/Iframe">{{@$row->video}}</textarea>
                                                @if($row->type==3)
                                                    <iframe class="mt-2 youtube-frame" width="100%" height="315" src="https://www.youtube.com/embed/{{$row->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                @endif
                                            </div>

                                            <div class="col-lg-6 typeupload" style="display: none;">
                                                <label for="formFile" class="form-label d-block">Video</label>
                                                    <input class="form-control upload-video-image" type="file" accept="video/*" name="video" data-target="video">
                                                    <video id="video-preview" style="display:none;"></video>
                                                    <canvas id="video-thumbnail" style="display:none;"></canvas>
                                                    <img class="upload-img-view img-thumbnail mt-2 mb-2 video" id="video-thumbnail-output" src="{{Helpers::image_check(@$row->image)}}" alt="banner image" style="display:none;" />
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
    var type='';
    $(document).on("change", ".type",(function(e) {
        checkTtype();
    }));
    function checkTtype()
    {
        type = $(".type").val();

        $(".typeupload, .typelink, .youtube-frame, .vimeo-frame").hide();
        if(type==1)
        {
            $(".typeupload").show();
        }
        else if(type==2 || type==3)
        {
            $(".typelink").show();
        }

        if(type==3) $(".youtube-frame").show();
        if(type==2) $(".vimeo-frame").show();

    }
    checkTtype();
</script>


</body>
</html>