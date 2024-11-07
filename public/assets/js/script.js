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


// get chart details monthly booking
document.addEventListener('DOMContentLoaded', function () {
    fetch('/admin/getmontlybooking') // Assuming this PHP script returns the data
        .then(response => response.json())
        .then(data => {

            // console.log(data);
            // Extract labels and data from the response
            const labels = data.labels; // ['January', 'February', 'March', 'April', 'May']
            const revenue = data.data;  // [65, 59, 80, 81, 56]

            var options = {
                series: [{
                    name: 'Monthly Booking',
                    data: revenue
                }],
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
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

            var chart = new ApexCharts(document.querySelector("#monthlyRevenueChart"), options);
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
