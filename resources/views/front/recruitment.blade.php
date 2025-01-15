@extends('front.app');
@section('title', '招募申請')
@section('content')
<style>
    .button3 {
        padding: 5px 10px;
        font-size: 16px;
        border: 2px solid transparent;
        border-radius: 30px;
        background-color: #7E0137;  /* 初始顏色 */
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;  /* 變色時加上過渡效果 */
    }

    .button3:hover {
        background-color: #970a49;  /* 滑鼠懸停時的顏色 */
        border-color: #970a49;     /* 邊框顏色改變 */
    }
</style>
<script>
document.getElementById('dateForm').addEventListener('submit', function(event) {
    event.preventDefault(); // 阻止表單提交的預設行為

    // 取得日期選擇器的值
    const dateValue = document.getElementById('dateTime').value;

    // 檢查是否有選擇日期
    if (dateValue) {
        document.getElementById('output').textContent = `Selected Date: ${dateValue}`;
    } else {
        document.getElementById('output').textContent = 'No date selected!';
    }
});
// 星期的對應陣列
const weekdays = ["日", "一", "二", "三", "四", "五", "六"];

// 當日期改變時，更新星期顯示
document
    .getElementById("dateTime")
    .addEventListener("change", function() {
        const dateValue = this.value;
        if (dateValue) {
            const date = new Date(dateValue);
            const weekday = weekdays[date.getDay()]; // 取得星期幾 (0-6)
            document.getElementById("weekday").textContent = `星期${weekday}`;
        }
    });
</script>
<div class="gw pt-1 content">
    <div class="bgbox" style="padding: 40px;">
        <div class="ps-3">
            <form method="post" action="/recruitment" id="dateForm">
                {{ csrf_field()}}
                <p style="font-size: 24pt; text-align:center">申請招募/預約時間</3>
                </p>
                <input type="hidden" name="address" value="{{session('address','$address')}}"></p>
                <p>申請人暱稱：<input type="text" style="border:none;" name="nickName" value="" required></p>
                <p>系　　　統：<input type="text" style="border:none;" name="system" value="" required></p>
                <p>模　　　組：<input type="text" style="border:none;" name="module" value="" required></p>
                <p>等 級(選填)：<input type="text" style="border:none;" name="level" value="">
                </p>
                <p>招 募 人 數：<input type="number" style="border:none;" name="nuOfMember" value="2" min="2" max="5"
                        step="1" required>(3人成團，6人滿團)</p>
                簡　　　介：(上限120字)</br>
                <textarea name="content" style="border:none;" cols="35vw" rows="5" value="" maxlength="120"></textarea>
                </p>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        預 約 時 間：</br>
                        <div class="text-center p-2" style="background-color: #C79E69;">
                            <label>目前預約情形</label>
                            <iframe
                                src="https://calendar.google.com/calendar/embed?src=zh-tw.taiwan%23holiday%40group.v.calendar.google.com&ctz=Asia%2FTaipei"
                                style="border: 0" width="100%" height="300px" frameborder="0"
                                scrolling="no"></iframe></br></br>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        </br></br>
                        日期：<input type="date" id="dateTime" name="dateTime" required><span id="weekday" required></span>
                        </p>
                        時段：
                        <select size="1" name="timeSlot" required>
                            <option value="全天/13:00~21:00" selected>全天/13:00~21:00</option>
                            <option value="半天/13:00~18:00">半天/13:00~18:00</option>
                        </select>
                        <span class="validity"></span>
                    </div>
                </div>
                <div style="display: flex;justify-content: center;margin-top:20px">
                    <input type="submit" name="apply" value="申請招募" class="button3"
                        style="width: 120px; height: 50px; border: none;">
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
