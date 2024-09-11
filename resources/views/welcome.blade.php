<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .card-body img {
            width: 280px;
            height: 200px;
            object-fit: cover;
        }

        .text-truncate-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
    </style>



</head>

<body>
    @extends('layout.master')
    @section('content')
        <div>
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/pictures/Colosal.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card w-100 bg-white border-0">
                    <div class="card-body">
                        <h5 class="card-title">กิจกรรมที่เปิดรับสมัคร</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-4">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">รายละเอียด</th>
                                        <th class="text-center">การรับสมัคร</th>
                                        <th class="text-center">ดูข้อมูลเพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td class="text-center">
                                                @if ($activity->registration_status == 'open')
                                                    <span class="badge bg-success">เปิด</span>
                                                @else
                                                    <span class="badge bg-danger">ปิด</span>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="fa-solid fa-house"></i> กิจกรรม: <span
                                                    style="color: blue;">{{ $activity->actName }}</span>
                                                <br><i class="fa-solid fa-list"></i> จัดโดย: {{ $activity->actResBranch }}
                                                &nbsp;&nbsp; <i class="fa-solid fa-location-dot"></i> สถานที่:
                                                {{ $activity->actLocation }}
                                                <br><i class="fa-solid fa-clock"></i> ชั่วโมงกิจกรรมที่ได้รับ:
                                                {{ $activity->actHour }} ชั่วโมง
                                            </td>
                                            <td class="text-center">
                                                <i class="fa-solid fa-calendar-days"></i> รับสมัครถึงวันที่: {{ $activity->actDate }}
                                                <br><i class="fa-solid fa-user"></i> จำนวนที่รับ: 
                                                <span style="color: green;">{{ $activity->submitted_students }}</span> / 
                                                <span style="color: red;">{{ $activity->actRegisLimit }}</span>
                                            </td>
                                            
                                            
                                            <td class="text-center">
                                                <button class="btn btn-success"
                                                    onclick="location.href='{{ route('activity.info', $activity->actId) }}'">ดูข้อมูล</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-end mt-3">
                                <a href="{{ route('activity.showFront') }}" class="btn btn-warning">
                                    <i class="fa-solid fa-list-ul"></i> ดูกิจกรรมทั้งหมด
                                </a>
                            </div>
                            <!-- Activities Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $activities->appends(['newsPage' => Request::input('newsPage')])->links('vendor.pagination.bootstrap-5') }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card mb-4 border-0">
                    <div class="card-header bg-transparent">
                        <!-- Added an icon before the title -->
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-newspaper"></i> ข่าวสาร ประชาสัมพันธ์
                        </h5>
                    </div>
                    @foreach ($news as $article)
                        <div class="card-body d-flex flex-row-reverse justify-content-between align-items-center">
                            <img src="{{ $article->imagePath ? asset('storage/' . $article->imagePath) : 'https://via.placeholder.com/200' }}"
                                class="img-fluid" alt="...">
                            <div>
                                <h5 class="card-title">
                                    <a href="{{ route('news.details', $article->newsId) }}"
                                        class="text-decoration-none">{{ $article->title }}</a>
                                </h5>
                                <!-- Use CSS to limit the number of lines shown -->
                                <p class="card-text text-truncate-3">
                                    {{ Str::limit(strip_tags($article->details), 300, '...') }}
                                </p>
                            </div>
                        </div>
                        <hr> <!-- Line divider between news items -->
                    @endforeach

                    <!-- News Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $news->appends(['activitiesPage' => Request::input('activitiesPage')])->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>




            <div class="col-md-4">
                <div class="card" style="border: none">
                    <div class="card-body">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fscistudentsbru&tabs=timeline&width=450&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="450" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
