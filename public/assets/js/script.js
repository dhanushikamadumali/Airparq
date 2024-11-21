'use_strict';
//promo code delete start
function promocodedelete(x){
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
            confirm: {
                text: "Yes, delete it!",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
            },
        }).then((Delete) => {
            if (Delete) {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/admin/deletepromocode/${x}`, {
                    method: 'delete',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ id: x })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        swal({
                            title: "Deleted!",
                            text: data.message,
                            type: "success",
                            buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                            },
                        }).then(()=>{
                            window.location.reload();
                        });
                    }else{
                        swal({
                            title:"Error!",
                            text:data.message,
                            icon:"error",
                            buttons:{
                                confirm:{
                                    className: "btn btn-danger",
                                }
                            }
                        })
                    }

                })
                .catch(error => {
                    swal.close();

                });

            }
        });

}
// promo code delete end


//terminal delete start
function terminaldelete(x){
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
        confirm: {
            text: "Yes, delete it!",
            className: "btn btn-success",
        },
        cancel: {
            visible: true,
            className: "btn btn-danger",
        },
        },
    }).then((Delete) => {
        if (Delete) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/deleteterminal/${x}`, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: x })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    swal({
                        title: "Deleted!",
                        text: data.message,
                        type: "success",
                        buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                        },
                    }).then(()=>{
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:"Error!",
                        text:data.message,
                        icon:"error",
                        buttons:{
                            confirm:{
                                className: "btn btn-danger",
                            }
                        }
                    })
                }

            })
            .catch(error => {
                swal.close();

            });


        }
    });
}
// terminal delete end

//contact delete start
function contactdelete(x){
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
        confirm: {
            text: "Yes, delete it!",
            className: "btn btn-success",
        },
        cancel: {
            visible: true,
            className: "btn btn-danger",
        },
        },
    }).then((Delete) => {
        if (Delete) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/deletecontact/${x}`, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: x })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    swal({
                        title: "Deleted!",
                        text: data.message,
                        type: "success",
                        buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                        },
                    }).then(()=>{
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:"Error!",
                        text:data.message,
                        icon:"error",
                        buttons:{
                            confirm:{
                                className: "btn btn-danger",
                            }
                        }
                    })
                }

            })
            .catch(error => {
                swal.close();

            });


        }
    });
}
// terminal delete end


// get chart details month to date  booking
document.addEventListener('DOMContentLoaded', function () {
    fetch('/admin/getmontlybooking') // Assuming this PHP script returns the data
        .then(response => response.json())
        .then(data => {
            // Extract labels and data from the response
            const labels = data.labels; // e.g., ['1', '2', '3', '4', ...]
            const revenue = data.data;  // e.g., [65, 59, 80, 81, ...]

            var options = {
                series: [{
                    name: 'Monthly Booking',
                    data: revenue
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                    title: {
                        text: 'Date of the Month',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'Booking Count',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#e0e0e0',
                },
                fill: {
                    type: 'solid',
                    colors: ['#21b0d3']
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    colors: ['#ff8c1a'],
                    width: 2
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    enabled: true
                }
            };

            var chart = new ApexCharts(document.querySelector("#monthlyRevenueChart"), options);
            chart.render();
        });
});

// get chart details today income booking
document.addEventListener('DOMContentLoaded', function () {
    fetch('/admin/gettodayincomebooking') // Assuming this PHP script returns the data
        .then(response => response.json())
        .then(data => {
            // Extract labels and data from the response
            const labels = data.labels; // e.g., ['1', '2', '3', '4', ...]
            const revenue = data.data;  // e.g., [65, 59, 80, 81, ...]

            var options = {
                series: [{
                    name: 'Today Income Booking',
                    data: revenue
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                    title: {
                        text: 'Today',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'Booking Count',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#e0e0e0',
                },
                fill: {
                    type: 'solid',
                    colors: ['#21b0d3']
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    colors: ['#21b0d3'],
                    width: 2
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    enabled: true
                }
            };

            var chart = new ApexCharts(document.querySelector("#TodayIncomeBookingChart"), options);
            chart.render();
        });
});


// get chart details month to date  booking revenue
document.addEventListener('DOMContentLoaded', function () {
    fetch('/admin/getcurrentmonthrevenue') // Assuming this PHP script returns the data
        .then(response => response.json())
        .then(data => {
            // Extract labels and data from the response
            const labels = data.labels; // e.g., ['1', '2', '3', '4', ...]
            const revenue = data.data;  // e.g., [65, 59, 80, 81, ...]

            var options = {
                series: [{
                    name: 'Month to date Revenue',
                    data: revenue
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                    title: {
                        text: 'Date of the Month',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'Booking Revenue',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#e0e0e0',
                },
                fill: {
                    type: 'solid',
                    colors: ['#21b0d3']
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    colors: ['#00e64d'],
                    width: 2
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    enabled: true
                }
            };

            var chart = new ApexCharts(document.querySelector("#monthtoDateBookingRevenueChart"), options);
            chart.render();
        });
});

// get chart details today revenue
document.addEventListener('DOMContentLoaded', function () {
    fetch('/admin/gettodayincomerevenue') // Assuming this PHP script returns the data
        .then(response => response.json())
        .then(data => {
            // Extract labels and data from the response
            const labels = data.labels; // e.g., ['1', '2', '3', '4', ...]
            const revenue = data.data;  // e.g., [65, 59, 80, 81, ...]

            var options = {
                series: [{
                    name: 'Today Revenue',
                    data: revenue
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                    title: {
                        text: 'Today',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'Today Booking Revenue',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#e0e0e0',
                },
                fill: {
                    type: 'solid',
                    colors: ['#21b0d3']
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    colors: ['#ff3333'],
                    width: 2
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    enabled: true
                }
            };

            var chart = new ApexCharts(document.querySelector("#TodayIncomeBookingRevenueChart"), options);
            chart.render();
        });
});


//promo code delete start
function bookingpricedelete(x){
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
        confirm: {
            text: "Yes, delete it!",
            className: "btn btn-success",
        },
        cancel: {
            visible: true,
            className: "btn btn-danger",
        },
        },
    }).then((Delete) => {
        if (Delete) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/deletebookingprice/${x}`, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: x })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    swal({
                        title: "Deleted!",
                        text: data.message,
                        type: "success",
                        buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                        },
                    }).then(()=>{
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:"Error!",
                        text:data.message,
                        icon:"error",
                        buttons:{
                            confirm:{
                                className: "btn btn-danger",
                            }
                        }
                    })
                }

            })
            .catch(error => {
                swal.close();

            });

        }
    });

}
// promo code delete end

//booking delete start
function bookingdetailsdelete(x){
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
        confirm: {
            text: "Yes, delete it!",
            className: "btn btn-success",
        },
        cancel: {
            visible: true,
            className: "btn btn-danger",
        },
        },
    }).then((Delete) => {
        if (Delete) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/deletebookingdetails/${x}`, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: x })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    swal({
                        title: "Deleted!",
                        text: data.message,
                        type: "success",
                        buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                        },
                    }).then(()=>{
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:"Error!",
                        text:data.message,
                        icon:"error",
                        buttons:{
                            confirm:{
                                className: "btn btn-danger",
                            }
                        }
                    })
                }

            })
            .catch(error => {
                swal.close();

            });

        }
    });

}
// booking delete end


//booking cancle start
function bookingdetailscancle(x){
    swal({
        title: "Are you sure?",
        text: "You won't be able to cancle this!",
        type: "warning",
        buttons: {
        confirm: {
            text: "Yes, Cancle it!",
            className: "btn btn-success",
        },
        cancel: {
            visible: true,
            className: "btn btn-danger",
        },
        },
    }).then((Delete) => {
        if (Delete) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/admin/canclebookingdetails/${x}`, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: x })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    swal({
                        title: "Cancled!",
                        text: data.message,
                        type: "success",
                        buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                        },
                    }).then(()=>{
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:"Error!",
                        text:data.message,
                        icon:"error",
                        buttons:{
                            confirm:{
                                className: "btn btn-danger",
                            }
                        }
                    })
                }

            })
            .catch(error => {
                swal.close();

            });

        }
    });

}
// booking cancle end
