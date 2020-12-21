@extends('layouts.app')

@section('title', ' - 서일 캠퍼스타운')

@section('style')
<link rel="stylesheet" href="{{asset('css/map.css')}}">
@endsection


@section('content')


<body>
    <main>
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">서일대 캠퍼스타운</h4>
                        <p class="campustown-under-line"></p>
                        <ul class="list-group">
                            <li class="list-item">사업명 : 스마트 중랑·SCV프로그램</li>
                            <li class="list-item">사업분야 : 창업육성, 문화특성화</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">사업 목표</h4>
                        <p class="campustown-under-line"></p>
                        <ul class="list-group">
                            <li class="list-item">청년일자리 창출, 지역사회 친화형 캠퍼스타운 창조</li>
                            <li class="list-item">실제 창업 기회를 부여함으로써 청년창업 활성화에 기여</li>
                            <li class="list-item">가로환경 개선 및 지역 주민과 함께 즐길 수 있는 열린 문화공간 마련</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">사업 내용</h4>
                        <p class="campustown-under-line"></p>
                        <ul class="list-group">
                            <li class="list-item">청년일자리 창출, 지역사회 친화형 캠퍼스타운 창조</li>
                            <li class="list-item">청년창업지원 및 상설매장 운영</li>
                            <li class="list-item list-group-not"> - 창업지원을 위한 공간을 마련하여 체계적인 창업 교육 및 실습 수행</li>
                            <li class="list-item list-group-not"> - 매장 운영에 대한 실질적인 경험을 할 수 있는 공간 제공</li>
                            <li class="list-item">○ 특색있는 대학 거리 조성</li>
                            <li class="list-item list-group-not"> - 공공디자인 개발하여 서일대학교의 정체성을 확립</li>
                            <li class="list-item">○ 청년 문화의 거리 조성</li>
                            <li class="list-item list-group-not"> - 대학생과 지역 주민이 함께 즐기는 열린 문화 공간 마련</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">기대 효과</h4>
                        <p class="campustown-under-line"></p>
                        <ul class="list-group">
                            <li class="list-item">○ 대학과 지역이 상생할 수 있는 다양한 프로그램 정립</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">목표</h4>
                        <p class="campustown-under-line"></p>
                        <ul class="list-group">
                            <li class="list-item"> ○ 청년문제와 지역의 활력 침체 문제를 동시에 해결할 수 있도록 서일대학과 지역사회 중심인 중랑구청의 활동범위를 아우르는
                                성공적인 도시재생 모델 창조</li>
                            <li class="list-item"> ○ 청년일자리 창출, 문화적 특색을 갖춘 지역사회 친화형 캠퍼스타운 창조, 지역경제 활성화</li>
                            <li class="list-item"> ○ 사업목표 달성을 위해 대학의 인적, 물적, 지적 자원을 효과적으로 활용하여, 대학과 지역이 상생할 수 있는 다양한
                                프로그램 정립</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-ceter">
                    <div class="col-12">
                        <img src="{{ asset('/storage/images/strategy.png') }}" alt="추진전략" style="width:100%;">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">추진전략</h4>
                        <p class="campustown-under-line"></p>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">(1) 청년일자리 창출</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted"> ○ 청년창업지원</h6>
                                        <p class="card-text">
                                            <p> (예비)창업자를 대상으로 창업교육지원 프로그램을 운영하여 창업성공률 제고</p>
                                            <p> 창업지원을 위한 공간을 마련하여 체계적인 창업 교육 및 실습 수행</p>
                                            <p> 창업 아이디어 공모전을 통한 우수 제품 및 아이디어 발굴</p>
                                            <h6 class="card-subtitle mb-2 text-muted"> ○ 상설매장 운영</h6>
                                            <p> 매장 운영에 대한 실질적인 경험을 할 수 있는 공간 제공</p>
                                            <p> (예비)창업가에게 제품 기획, 제작, 홍보 등 창업활동 지원</p>
                                            <p> 교내 보유 장비(3D 프린터)를 활용한 시제품 제작 지원</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card_center">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">(2) 지역경제 활성화<h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <p><b>○ 캠퍼스타운 홈페이지 및 App 개발</b></p>
                                        </h6>
                                        <p class="card-text">
                                            <p> 서일 청춘길과 주변 상가를 홍보할 수 있는 홈페이지 및 App을 개발하여 상가 정보검색, 배달 및 예약, 이벤트 알림 등 제공
                                            </p>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <p> ○ 특색 있는 대학 거리 조성</p>
                                            </h6>
                                            <p> 대학로의 브랜드와 대학콘텐츠를 살린 공공디자인 개발 및 물리적인 가로 환경 개선</p>
                                            <h6 class="card-subtitle mb-2 text-muted"> ○ 청춘길 홍보 </h6>
                                            <p> 서일 청춘길 브랜드 아이덴티티 매뉴얼 개발</p>
                                            <p> 대학 및 상권 홍보를 위한 홍보 리플렛 디자인 및 인포그래픽 개발</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-offset-6 card_end">
                                <div class="card" style="width: 100%;">
                                    <div class="card-header">
                                        <h5 class="card-title">(3) 문화적 특색을 갖춘 지역사회 친화형 캠퍼스타운 창조</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <p><b> ○ 청년 문화의 거리 조성</b></p>
                                        </h6>
                                        <p class="card-text">
                                            <p> 대학 내 예술학과를 중심으로 예술 공연을 기획하여 지역 내 문화 공간 마련</p>
                                            <p> 다양한 야외 공연활동 영상물 제작 및 SNS를 통한 홍보</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">기대 효과</h4>
                        <p class="campustown-under-line"></p>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <ul class="list-group">
                                    <li class="list-item"> ○ 청년창업지원</li>
                                    <li class="list-item list-group-not"> ○ 창업 교육 한계를 극복하여, 실제 창업에 도전할 수 있는 기회를 부여함으로써
                                        청년창업 활성화에 기여</li>
                                    <li class="list-item list-group-not"> ○ 대학과 지역상권의 협력을 통한 대학발전과 지역경제 활성화</li>
                                    <li class="list-item list-group-not"> ○ 청년활동 및 지역경제 활성화를 위한 가로환경 개선 및 지역 주민과 대학생이 함께
                                        즐길 수 있는 열린 문화 공간 마련을 목적으로 함</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <img src="{{ asset('/storage/images/guide_map.png') }}" alt="기대효과" style="width:100%;">
                            </div>
                        </div>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <!-- 이미지 자리 -->
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title text-center">사업 위치도</h4>
                        <p class="campustown-under-line"></p>
                        <div class="text-center">
                            <img src="{{ asset('/storage/images/map.png') }}" alt="사업 위치도" style="width:100%;">
                        </div>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="campustown-list-group">
                        <h4 class="campustown-list-title">추진 계획</h4>
                        <p class="campustown-under-line"></p>
                        <h4> 1. 대학 및 지역 내 (예비)청년 창업가 등 창업 관련 경험 및 지식 공유를 통한 창업육성</h4>
                        <ul class="list-group">
                            <li class="list-item">청년창업지원</li>
                            <li class="list-item list-group-"> - 대학 및 지역 내 (예비)청년 창업가를 대상으로 하는 특강 운영 </li>
                            <li class="list-item list-group-"> - 기 창업가와 예비창업가와의 멘토-멘티 매칭 </li>
                            <li class="list-item list-group-"> - 창업아이디어 공모전을 통한 우수 제품 및 아이디어 발굴 </li>
                            <li class="list-item">상설매장 운영</li>
                            <li class="list-item list-group-"> - 매장 운영의 실질적 경험 제공을 통해 (예비)창업가의 사업성공률 제고</li>
                            <li class="list-item list-group-"> - (예비)창업가의 제품 기획, 제작, 홍보 등 창업활동과 시제품 제작 지원</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                        <h4> 2. 대학과 지역상권의 협력을 통한 지역경제 활성화</h4>
                        <ul class="list-group">
                            <li class="list-item">캠퍼스타운 홈페이지 및 App 개발</li>
                            <li class="list-item list-group-"> - 주변 상가 홍보 및 이벤트 등 정보를 담은 홈페이지 및 App 개발 </li>
                            <li class="list-item">특색 있는 대학 거리 조성</li>
                            <li class="list-item list-group-"> - 대학로의 브랜드와 대학의 콘텐츠를 살린 공공 디자인 개발과 가로 환경 개선 </li>
                            <li class="list-item">청춘길 홍보</li>
                            <li class="list-item list-group-"> - 홍보 리플렛, 인포그래픽 개발 등을 통한 지역 상권 활성화</li>
                        </ul>
                        <p class="campustown-under-line"></p>
                        <h4> 3. 지역 주민과 대학생이 함께 즐길 수 있는 열린 문화 공간 마련</h4>
                        <ul class="list-group">
                            <li class="list-item">청년 문화의 거리 조성</li>
                            <li class="list-item list-group-"> - 대학 내 예술학과 활용, 대학로 및 지역상권 중심 정기적인 예술 공연 기획 </li>
                            <li class="list-item list-group-"> - 대학생과 지역 주민이 함께 즐기는 열린 문화 공간 마련과 지역 상권 활성화 </li>
                        </ul>
                        <p class="campustown-under-line"></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
