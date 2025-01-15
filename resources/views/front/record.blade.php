@extends('front.app');
@section('title', '旅行者日誌')
@section('content')
<div class="gw pt-1 ps-3">
    <div class="bgbox" style="padding: 40px">
        <div class="col-12" style="height: auto;">
            <label class="recordLabel">旅行者日誌</label>
            <p class="recordP">~歡迎蒞臨旅行者之家，旅行者日誌將紀錄您的團務申請及參與情形~
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="applyRecord-tab" data-bs-toggle="tab"
                        data-bs-target="#applyRecord" type="button" role="tab" aria-controls="applyRecord"
                        aria-selected="true">申請紀錄</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="attendRecord-tab" data-bs-toggle="tab" data-bs-target="#attendRecord"
                        type="button" role="tab" aria-controls="attendRecord" aria-selected="false">參加紀錄</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="applyRecord" role="tabpanel"
                    aria-labelledby="applyRecord-tab">
                    <div id="inReview" class="task-section">
                        <h4>申請中團務</h4>
                        <div class="accordion" id="accordioninReview">
                            @foreach ($inReview as $data)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $data->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $data->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $data->id }}">
                                        申請時間：{{ $data->createTime }}/系統：{{ $data->system }}/模組：{{ $data->module }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $data->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $data->id }}" data-bs-parent="#accordioninReview">
                                    <div class="accordion-body">
                                        <ul class="m-2" style="font-size: 18px; text-align:left;line-height:0.8;">
                                            <li>系統：{{ $data->system }}</li></br>
                                            <li>模組：{{ $data->module }}</li></br>
                                            <li>等級：{{ $data->level }}</li></br>
                                            <li>招募人數：{{ $data->nuOfMember }}</li></br>
                                            <li>時間：{{ $data->dateTime }}</br></br>　　　{{ $data->timeSlot }}</li></br>
                                            <li style="line-height:24px;">簡介：</br>{{ $data->content }}</li></br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="inPassed" class="task-section">
                        <h4>招募中團務</h4>
                        <div class="accordion" id="accordioninPassed">
                            @foreach ($inPassed as $data)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $data->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $data->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $data->id }}">
                                        申請時間：{{ $data->createTime }}/系統：{{ $data->system }}/模組：{{ $data->module }}/GM：{{ $data->gm }}/{{ $data->result }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $data->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $data->id }}" data-bs-parent="#accordioninPassed">
                                    <div class="accordion-body">
                                        <ul class="m-2" style="font-size: 18px; text-align:left;line-height:0.8;">
                                            <li><b>GM：{{ $data->gm }}</b></li></br>
                                            <li>系統：{{ $data->system }}</li></br>
                                            <li>模組：{{ $data->module }}</li></br>
                                            <li>等級：{{ $data->level }}</li></br>
                                            <li>招募人數：{{ $data->nuOfMember }}</li></br>
                                            <li>時間：{{ $data->dateTime }}</br></br>　　　{{ $data->timeSlot }}</li></br>
                                            <li style="line-height:24px;">簡介：</br>{{ $data->content }}</li></br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="inFinished" class="task-section">
                        <h4>已結束團務</h4>
                        <div class="accordion" id="accordioninFinished">
                            @foreach ($inFinished as $data)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $data->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $data->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $data->id }}">
                                        申請時間：{{ $data->createTime }}/系統：{{ $data->system }}/模組：{{ $data->module }}/GM：{{ $data->gm }}/{{ $data->result }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $data->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $data->id }}" data-bs-parent="#accordioninFinished">
                                    <div class="accordion-body">
                                        <ul class="m-2" style="font-size: 18px; text-align:left;line-height:0.8;">
                                            <li><b>GM：{{ $data->gm }}</b></li></br>
                                            <li>系統：{{ $data->system }}</li></br>
                                            <li>模組：{{ $data->module }}</li></br>
                                            <li>等級：{{ $data->level }}</li></br>
                                            <li>招募人數：{{ $data->nuOfMember }}</li></br>
                                            <li>時間：{{ $data->dateTime }}</br></br>　　　{{ $data->timeSlot }}</li></br>
                                            <li style="line-height:24px;">簡介：</br>{{ $data->content }}</li></br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="attendRecord" role="tabpanel" aria-labelledby="attendRecord-tab">
                    <div id="inAttend" class="task-section">
                        <h4>參加紀錄</h4>
                        @foreach ($inAttend as $data)
                        @foreach ($data->recruitments as $recruitment)
                        <div class="accordion" id="accordioninAttend">
                            <h2 class="accordion-header" id="heading{{ $recruitment->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $recruitment->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $recruitment->id }}">
                                    申請時間：{{ $recruitment->createTime }}/系統：{{ $recruitment->system }}/模組：{{ $recruitment->module }}/{{ $recruitment->result }}
                                </button>
                            </h2>
                            <div id="collapse{{ $recruitment->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $recruitment->id }}" data-bs-parent="#accordioninReview">
                                <div class="accordion-body">
                                    <ul class="m-2" style="font-size: 18px; text-align:left;line-height:0.8;">
                                        <li>招募人：{{ $recruitment->nickName }}</li></br>
                                        <li>GM：{{ $recruitment->gm }}</li></br>
                                        <li>系統：{{ $recruitment->system }}</li></br>
                                        <li>模組：{{ $recruitment->module }}</li></br>
                                        <li>等級：{{ $recruitment->level }}</li></br>
                                        <li>招募人數：{{ $recruitment->nuOfMember }}</li></br>
                                        <li>時間：{{ $recruitment->dateTime }}</br></br>　　　{{ $recruitment->timeSlot }}
                                        </li></br>
                                        <li style="line-height:24px;">簡介：</br>{{ $recruitment->content }}</li></br>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection