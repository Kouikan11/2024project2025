@extends("admin.layout")
@section("title","")
@section("content")
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">@yield("title")</h3>
                <h3>歡迎{{ session("managerId",'$userId') }}回到旅行者之家管理者頁面</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @yield("title")
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
@endsection