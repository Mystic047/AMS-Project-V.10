@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <!-- Total Admins -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>แอดมิน ทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalAdmins }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Students -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>นักศึกษา ทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalStudents }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Professors -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>อาจารย์ ทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalProfessors }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Coordinators -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>ฝ่ายกิจกรรม ทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCoordinators }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Pie Chart Section for Students, Professors, Coordinators, and Admins -->
        <div class="row" style="height: 400px;">

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h4>จำนวนนักศึกษาตามสาขา</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="studentsChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        <h4>จำนวนนักศึกษาที่ลงทะเบียนกิจกรรมของแต่ละสาขา</h4>
                        <!-- Dropdown for selecting activity -->
                        <select id="activityDropdown" class="form-control mt-2">
                            <option value="" disabled selected>เลือกกิจกรรม</option>
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>

                    <div class="card-body">
                        <h5 id="totalSubmissions" class="text-center"></h5>
                        <canvas id="studentsActivityAreaChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- Load Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Pie Chart Data
        var labels = [
            @foreach ($facultyData as $faculty)
                '{{ $faculty->areaName }}',
            @endforeach
        ];

        var studentsData = [
            @foreach ($facultyData as $faculty)
                {{ $faculty->students_count }},
            @endforeach
        ];

        // Function to create a pie chart
        function createPieChart(chartId, chartData, chartLabel) {
            var ctx = document.getElementById(chartId).getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: chartLabel,
                        data: chartData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: chartLabel
                        }
                    }
                }
            });
        }

        // Create Pie Chart for Students by Area
        createPieChart('studentsChart', studentsData, 'นักศึกษา');
    </script>

    <script>
        var studentsActivityAreaChart;

        // Fetch and populate activities on page load
        window.onload = function() {
            fetch(`/dashboard/get-activities`)
                .then(response => response.json())
                .then(activities => {
                    var dropdown = document.getElementById('activityDropdown');
                    dropdown.innerHTML = '<option value="" disabled selected>เลือกกิจกรรม</option>';
                    activities.forEach(activity => {
                        var option = document.createElement('option');
                        option.value = activity.actId;
                        option.textContent = activity.actName;
                        dropdown.appendChild(option);
                    });
                });
        };

        // Handle activity selection and fetch submissions data
        document.getElementById('activityDropdown').addEventListener('change', function() {
            var actId = this.value;
            fetch(`/dashboard/get-activity-submissions/${actId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Log the data for debugging

                    var labels = Object.keys(data);
                    var values = Object.values(data);

                    // Calculate the total number of submissions
                    var totalSubmissions = values.reduce((sum, value) => sum + value, 0);
                    document.getElementById('totalSubmissions').textContent =
                        `จำนวนคนลงทะเบียน: ${totalSubmissions}`;

                    if (studentsActivityAreaChart) {
                        studentsActivityAreaChart.destroy(); // Destroy previous chart
                    }

                    var ctx = document.getElementById('studentsActivityAreaChart').getContext('2d');
                    studentsActivityAreaChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'จำนวน',
                                data: values,
                                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50',
                                    '#F44336'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching activity submissions:', error);
                    alert('An error occurred while fetching the data.');
                });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
