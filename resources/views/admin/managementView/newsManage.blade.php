<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .news-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 0%;
        }

        .truncate {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
    </style>
</head>

@extends('admin.layouts.master')
@section('content')

<body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
            <h1>จัดการข้อมูลข่าวสาร ประชาสัมพันธ์</h1>
        </div>
    </section>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="search-bar">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="ค้นหา...">
                    </div>
                    <a href="{{ route('news.showCreate') }}" class="btn btn-primary">สร้าง</a>
                </div>

                <!-- News table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table table-sm">
                            <tr>
                                <th class="col-3">รูปภาพ</th>
                                <th class="col-3">ชื่อเรื่อง</th>
                                <th class="col-4">เนื้อข่าว</th>
                                <th class="col-2">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->imagePath) }}" alt="News Image" class="news-image">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td class="truncate">{{ Str::limit(strip_tags($item->details), 300, '...') }}</td>
                                    <td>
                                        <a href="{{ route('news.edit', $item->newsId) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <form action="{{ route('news.delete', $item->newsId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this)">ลบ</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

</html>
