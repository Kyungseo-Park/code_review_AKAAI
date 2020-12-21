@extends('layouts.app')

@section('title', ' - 상설매장 U&Shop')

@section('style')
<style>
    /* 상설매장 헤더 */
.sub-header {
    width: 100%;
    min-height: 220px;
    max-height: 220px;
    background-size: cover;
    font-weight: 300;
    padding: 60px 0 64px;
    background-color: #f0f3f8;
}

.sub-header h3, .sub-header h4 {
    font-size: 42px;
}
.sub-header p {
    margin: 3px 0 0;
    font-size: 18px;
}

.wrap-container {
    text-align: center;
    margin: 0 auto;
}

.gt-relative {
    position: relative;
}


/* 상설매장 서치 */
.notice-list-head {
    margin: 80px 0 20px;
}

.gt-float-right {
    float: right;
}

/* 상설매장 바디 */
.ushop-img {
    padding: .5rem;
    position: relative;
    border: 1px solid #cecece;
    margin-bottom: .5rem;
    
}
.ushop-img > img {
    width: 100%;
}

.container{
    padding-top: 15px;
}
.ushop-container-item{
    padding: 1.4rem;
}

.ushop-p{
    /* padding: 0px; */
    margin: 0px;
}

@media(min-width: 540px){
    .new_d_title{
        padding-top: 1rem;
    }
}

@media(max-width: 540px){
    .ushop-container-itme{
        padding-left: 15px;
        padding-right: 15px;
    }
}




/* text 슬라이드 */

.none{display:none}
.navi{float:right;}

#title_3Slider{
    background-color : #f0f3f8;
}

@media (max-width: 473px) {
  .sub-header { 
      min-height: 145px;
      padding: 30px 0 34px;
  }
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="sub-header">
            <div class="wrap-container gt-relative">
                <h3>U&Shop</h3>
                <p>U&Shop을 통해 상설매장을 알아보세요.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-start">
        @foreach ($ushopList as $ushop)
        <div class="ushop-container-item col-lg-6 col-md-12 col-sm-12 col-12">
            <a href="{{ route('ushop.show.scn', ['id' => $ushop->id] ) }}">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ushop-img ">
                    @if ($ushop->thumbnail)
                        <img class='ushop_img' src="{{ asset($ushop->thumbnail) }}">
                    {{-- @elseif(strlen($image_l) > 2) 
                        기능 추가 해야함 
                        <img class='ushop_img' src={{ $image_l }}> --}}
                    @else
                        <img class='ushop_img' src="{{ asset('/uploads/ushop/123123.png') }}">
                    @endif
                </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 ushop-content ">
                        <div class="new_d_title">
                            <p class="ushop-p-title ushop-p">제목 : {{ $ushop->title }}
                        </div>
                        {{-- <div class="ushop-d-body">
                            <!-- <p class="ushop-p-body ushop-p">내용 : <?php echo (mb_substr($row['ushop_body'], 0, 15).'...') ?></p> -->
                        </div> --}}
                        <div class="ushop-d-dates">
                            <p class="ushop-p-date ushop-p">등록일 : {{ explode(' ', $ushop->created_at)[0] }}</p>
                        </div>
                        <div class="ushop-d-hit">
                            <p class="new-p-hit">조회수 : {{ $ushop->hits }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <ul class="pagination justify-content-center">
            {{ $ushopList->links() }}
        </ul>
    </div>
</div>
@endsection


@section('script')

@endsection