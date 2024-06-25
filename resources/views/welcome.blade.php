<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>
@extends('layout.master')
@section('content')
<body>
    <div>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://science.bru.ac.th/wp-content/uploads/2022/10/slider-1-1-copy.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://combu.bru.ac.th/wp-content/uploads/2024/02/422891036_825393186294436_1499709031224825189_n.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-8">
        <div class="card w-100 bg-white border-0">
          <div class="card-body">
            <h5 class="card-title">สมัครเข้าร่วมกิจกรรมออนไลน์</h5>
            <div class="table-responsive">
              <table class="table table-bordered table-hover mb-4">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 20%;">
                    <col style="width: 15%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                    <col style="width: 15%;">
                </colgroup>
                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">ชื่อกิจกรรม</th>
                        <th class="text-center">ประเภทกิจกรรม</th>
                        <th class="text-center">สถานที่</th>
                        <th class="text-center">การรับสมัคร</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td class="text-center">{{ $activity->activity_id }}</td>
                            <td class="text-center">{{ $activity->activity_name }}</td>
                            <td class="text-center">{{ $activity->activity_type }}</td>
                            <td class="text-center">{{ $activity->activity_location }}</td>
                            <td class="text-center">รับสมัครวันที่: {{ $activity->activity_date }}<br>จำนวนที่รับ: {{ $activity->activity_register_limit }}</td>
                            <td class="text-center">
                              <button class="btn btn-primary" onclick="location.href='{{ route('activity.info', $activity->activity_id) }}'">ดูข้อมูล</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 border-0">
            <div class="card-header text-center bg-transparent">
                <h5 class="card-title mb-0">ข่าวสาร ประชาสัมพันธ์</h5>
            </div>
            <div class="card-body d-flex flex-row-reverse justify-content-between align-items-center">
                <img src="https://via.placeholder.com/200" class="img-fluid" alt="...">
                <div>
                    <h5 class="card-title">บทความล่าสุด 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
                    <a href="#" class="btn btn-primary">อ่านต่อ</a>
                </div>
            </div>
        </div>
        <div class="card mb-4 border-0">
            <div class="card-body d-flex flex-row-reverse justify-content-between align-items-center">
                <img src="https://via.placeholder.com/200" class="img-fluid" alt="...">
                <div>
                    <h5 class="card-title">บทความล่าสุด 2</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
                    <a href="#" class="btn btn-primary">อ่านต่อ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Facebook Plugin</h5><br>
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fscistudentsbru&tabs=timeline&width=450&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="450" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Card 4</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
@endsection
</html>
